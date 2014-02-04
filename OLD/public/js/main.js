(function($){
    var Prax = function( element, options ) {
        var settings = $.extend({
            'sections': '.prax-slide',
            'scroller': '.prax-scroller'
        }, options);

        var $window = $(window),
            $body = $('body'),
            $bodyAndHTML = $body.add('html'),
            $content = element,
            $sections = $content.find(settings.sections),
            $scroller = $(settings.scroller),
            fScrPercent = 0,
            aAnimProps = ['opacity','left','top','width','height','background-position'],
            sHash = location.hash,
            bAllowAnims = !~location.href.indexOf('noanims'),
            aAnimations = [],
            webkitCSS = document.body.style['webkitTransform'] !== undefined,
            mozCSS = document.body.style['MozTransform'] !== undefined,
            msCSS = document.body.style['msTransform'] !== undefined,
            iAnimTimeout, iWindowHeight, sLastHash, iMaxHeight, iWinScrTop,
            iLastScrTime, iScrTimeout, sWinSize, kinet2ics;

        $sections.each(function(ix){
            var $section = $sections.eq(ix);
            $section.data('$pNodes', $section.find('.animate'));
            $section.data('bSection', true);
//            console.log($(this));
            $section.add($section.data('$pNodes')).each(function(){
                var $this = $(this),
                    oData = $this.data();
                oData.iPause = 0 | $this.attr('anim-pause');
                oData.bDetached = !! ~'1 true'.indexOf($this.attr('anim-detached'));
                oData.fSpeed = parseFloat($this.attr('anim-speed')) || 1;
                oData.onFocus = $this.attr('anim-focus-handler');
                oData.onBlur = $this.attr('anim-blur-handler');
                oData.iBottom = 0;
                oData.iTop = 0;
            });
//            console.log($section.data());
//            console.log( '--' );
        });

        var parseUnit = function(vVal,$node,sValFn) {
                var aVal = /(-?\d+)(.*)/.exec(vVal),
                    fUnit = parseFloat(aVal[1]),
                    sUnit = aVal[2];
                switch(sUnit) {
                    case '':
                    case 'px':
                        return fUnit;
                    case '%':
                        return $node[sValFn]() * fUnit / 100;
                    default:
                        throw new Error('Unexpected unit type: ' + sUnit);
                        return;
                }
            },
            readCSSProps = function($node, $sClass) {
                var oObj = {},
                    i, l, vPropVal, sProp;
                $node.addClass($sClass).removeAttr('style');
                for(i=0,l<aAnimProps.length;i<l;i++) {
                    sProp = aAnimProps[i];
                    switch(sProp) {
                        case 'opacity':
                            vPropVal = 0 | $node.css(sProp);
                            break;
                        case 'left':
                        case 'top':
                            vPropVal = $node['outer'+sProp.substr(0,1).toUpperCase() + sProp.substr(1)]();
                            break;
                        case 'background-position':
                            vPropVal = ($node.css(sProp) || '0 0').split(' ');
                            vPropVal[0] = parseUnit(vPropVal[0],$node,'outerWidth');
                            vPropVal[1] = parseUnit(vPropVal[1],$node,'outerHeight');
                            break;
                    }
                    oObj[sProp] = vPropVal;
                }
                $node.removeClass('start focus to end');
                return oObj;
            },
            eq = function(vVal1,vVal2) {
                var i,l;
                if(vVal1 === vVal2) { return true; }
                if(typeof vVal !== typeof vVal2 ) { return false; }
                if(vVal1.length && vVal1.splice && vVal2.length && vVal2.splice) {
                    if(vVal1.length != vVal2.length) { return false; }
                    for(i=0,l=vVal1.length;i<l;i++) {
                        if(!eq(vVal1[i],vVal2[i])) { return false; }
                    }
                    return true;
                }
                return false;
            },
            propDiff = function(p1,p2) {
                var oDiff =  {}, n, bProp;
                for(n in p2) {
                    if(!eq(p1[n],p2[n])) {
                        oDiff[n] = bProp = [p1[n],p2[n]];
                    }
                }
                return bProp && oDiff;
            },
            addDiffAnimation = function($node,iTop,iStage,iAnimLength) {
                var stages = ['start','focus','to','end'],
                    iStartStage = iStage = 1,
                    sEndStage = stages[iStage],
                    oPropsEnd = readCSSProps($node,sEndStage),
                    oData = $node.data(),
                    bPreDefLen = !! iAnimLength,
                    oPropDiff, n, iDiff;
                if(!iAnimLength) { iAnimLength = 0; }
                oPropDiff = propDiff(readCSSProps($node, stages[iStartStage]), oPropsEnd);
                if(!oPropDiff) { return 0; }
                for(n in oPropDiff) {
                    iDiff = Math.abs(oPropDiff[n][1] - oPropDiff[n][0]);
                    if(!bPreDefLen && (iDiff > iAnimLength)) { iAnimLength = iDiff; }
                }
                aAnimations.push({
                    $node: $node,
                    pProps: oPropDiff,
                    iTop: iTop,
                    iBottom: iTop + iAnimLength,
                    bSectin: oData.bSection
                });
                return oData.bDetached ? 0 : iAnimLength;
            },
            measureAnimations = function() {
                var iTop = 0,
                    iStartTimer = +new Date(),
                    iLastSection = $sections.length - 1,
                    iPageHeight = 0,
                    oAnim, oData;

                aAnimations = window.aAnimations = [];
                $scroller.css('height', 10000);

                // add animations for each section & .animate tag in each section
                $sections.each(function(ix) {
                    var $sec = $(this),
                        oData = $sec.data(),
                        $pNodes = oData.$pNodes,
                        iSecHeight = 0,
                        iMaxPause = oData.iPause,
                        i, l, iAnimSize, $pNode;

                    oData.startsAt = iTop;

                    // append section to content and reset position
                    $sec.css({
                        top: '',
                        visibility: 'hidden'
                    }).appendTo($content);

                    if (ix) {
                        iSecHeight = addDiffAnimation($sec, iTop, 1);
                    }

                    for (i = 0, l = $pNodes.length; i < l; i++) {
                        $pNode = $pNodes.eq(i);

                        if (bAllowAnims) {
                            iMaxPause = Math.max(
                                iMaxPause, addDiffAnimation($pNode, iTop, 1, iSecHeight), iAnimSize = addDiffAnimation($pNode, iTop + iSecHeight + iMaxPause, 2, iSecHeight), addDiffAnimation($pNode, iTop + iSecHeight + iMaxPause + iAnimSize, 3, iSecHeight));
                        }
                    }

                    if (ix) {
                        iTop += iMaxPause; // Math.max( iSecHeight, iMaxPause, $sec.outerHeight() );
                    }

                    addDiffAnimation($sec, iTop + iSecHeight, 2);

                    if (ix < iLastSection) {
                        addDiffAnimation($sec, iTop + iSecHeight, 3);
                    }

                    $sec.detach().css({
                        visibility: 'visible'
                    });

                    oData.endsAt = iTop += iSecHeight;
                    oData.bVisible = false;
                });

                // wipe start/end positions on sections
                for (i = 0, l = $sections.length; i < l; i++) {
                    $sections.eq(i).data().iTop = Infinity;
                    $sections.eq(i).data().iBottom = -Infinity;
                }

                // post-process animations
                for (i = 0, l = aAnimations.length; i < l; i++) {
                    oAnim = aAnimations[i];

                    if (oAnim.iBottom > iPageHeight) {
                        iPageHeight = oAnim.iBottom;
                    }

                    if (oAnim.bSection) {
                        oData = oAnim.$node.data();
                        if (oAnim.iTop < oData.iTop) {
                            oData.iTop = oAnim.iTop;
                        }

                        if (oAnim.iBottom > oData.iBottom) {
                            oData.iBottom = oAnim.iBottom;
                        }
                    }
                }
                iPageHeight = Math.max(iPageHeight, ++$sections.last().data().iBottom);
                $scroller.css('height', (iMaxHeight = iPageHeight) + iWindowHeight);

                $window.trigger('animations-added', {
                    animations: aAnimations
                });
            },
            onResize = function() {
                var pTop = (iWinScrTop / iMaxHeight) || 0;

                measureAnimations();
                $window.trigger('post-resize-anim');
                $window.scrollTop(pTop * iMaxHeight);
                onScroll();

                kinetics.adjustRange(iMaxHeight).setPosition(pTop * iMaxHeight);
            },
            singleParialCSSProp = function(iScrTop, oAnim, oProp) {
                return (iScrTop - oAnim.iTop) / (oAnim.iBottom - oAnim.iTop) * (oProp[1] - oProp[0]) + oProp[0];
            },
            partialCSSProp = function(iScrTop,oAnim,oProp) {
                if (oProp[0].splice) {
                    return $.map(oProp[0], function(nul, ix) {
                        return (0 | singlePartialCSSProp(iScrTop, oAnim, [oProp[0][ix], oProp[1][ix]])) + 'px';
                    }).join(' ');
                } else {
                    return singlePartialCSSProp(iScrTop, oAnim, oProp);
                }
            },
            onScrollHandler = function() {
                var cDate = +new Date(),
                    iScrTop = $window.scrollTop(),
                    iDiff = cDate - iLastScrTime;

                iLastScrTime = cDate;
                if (iScrTimeout) {
                    clearTimeout(iScrTimeout);
                    iScrTimeout = 0;
                }

                // last tick was either recent enough or a while ago.  pass through
                if ((iDiff > 200) || (iDiff < 50)) {
                    onScroll(iScrTop);
                } else {

                    // stupid browser scrolling is too slow, fix it
                    var iLastTop = iWinScrTop,
                        iScrDiff = iScrTop - iLastTop;

                    function nextScrollTick() {
                        var now = +new Date(),
                            iStep = (now + 30 - cDate) / iDiff;

                        if (iStep > 1) {
                            iStep = 1;
                        }

                        onScroll(iLastTop + iScrDiff * iStep)

                        if (iStep < 1) {
                            iScrTimeout = setTimeout(nextScrollTick, 30);
                        }
                    }
                    nextScrollTick();
                }
            },
            onScroll = function(iScrTop) {
            var bChangedLoc = false,
                i, l, oAnim, $sec, oData, $node, sSecId, n, oCssProps, oProps, iCurScr, sState;

            iScrTop || (iScrTop = $window.scrollTop());

            iWinScrTop = iScrTop;

            if (iScrTop < 0) {
                iScrTop = 0;
            }
            if (iScrTop > iMaxHeight) {
                iScrTop = iMaxHeight;
            }

            // hide/show sections
            for (i = 0, l = $sections.length; i < l; i++) {
                $sec = $sections.eq(i);
                oData = $sec.data();

                if ((oData.iTop <= iScrTop) && (oData.iBottom >= (iScrTop))) {
                    if (!oData.bVisible) {
                        $sec.appendTo($content);
                        oData.bVisible = true;
                    }
                    if (!bChangedLoc) {
                        if (sLastHash != (sSecId = $sec.attr('id').split('-').pop())) {
                            location.replace('#' + (sLastHash = sSecId));
                            $body.prop('class', $body.prop('class').replace(/(?: |^)section-[^ ]+/g, '')).addClass('section-' + sSecId);
                        }
                        bChangedLoc = true;
                    }
                } else {
                    if (oData.bVisible) {
                        $sec.detach();
                        oData.bVisible = false;
                    }
                }
            }

            for (i = 0, l = aAnimations.length; i < l; i++) {
                oAnim = aAnimations[i];
                $node = oAnim.$node;
                iCurScr = iScrTop;

                if ((oAnim.iTop > iCurScr) || (oAnim.iBottom < iCurScr)) {
                    sState = oAnim.lastState;
                    oAnim.lastState = 'disabled';

                    // animation is newly disabled
                    if (sState === 'enabled') {
                        iCurScr = (oAnim.iTop > iCurScr) ? oAnim.iTop : oAnim.iBottom;
                    } else {
                        continue;
                    }

                } else {
                    oAnim.lastState = 'enabled';
                }

                // in the middle of an animation
                oCssProps = {};
                oProps = oAnim.oProps;
                for (n in oProps) {
                    oCssProps[n] = partialCSSProp(iCurScr, oAnim, oProps[n]);
                    //oCssProps[n] = 0|-( ( iScrTop - oProps[n][0] ) / ( oProps[n][1] - oProps[n][0] ) * ( oProps[n][1] - oProps[n][0] ) + oProps[n][0] );
                }
                $node.css(hardwareCSSTransform(oCssProps));
            }
        },
        hardwareCSSTransform = function(props) {
            if (props.top != null || props.left != null) {
                if (webkitCSS) {
                    props.webkitTransform = 'translate3d(' + (props.left || 0) + 'px, ' + (props.top || 0) + 'px, 0)';

                    if (null != props.top) {
                        props.top = 0;
                    }
                    if (null != props.left) {
                        props.left = 0;
                    }
                }

                if (mozCSS || msCSS) {
                    props[mozCSS ? 'MozTransform' : 'msTransform'] = (props.top ? 'translateY(' + props.top + 'px)' : '') + (props.left ? 'translateX(' + props.left + 'px)' : '');

                    if (null != props.top) {
                        props.top = 0;
                    }
                    if (null != props.left) {
                        props.left = 0;
                    }
                }
            }

            return props;
        }

            _init = function() {

            },


        _init();

        window.getAnimationController = function(sSelector) {
            var oAnim, i, l;

            for (i = 0, l = aAnimations.length; i < l; i++) {
                if (aAnimations[i].$node.is(sSelector)) {
                    oAnim = aAnimations[i];
                    break;
                }
            }

            if (!oAnim) {
                throw new Error('no animation matches selector ' + sSelector);
            }

            return {
                scrollTo: function(iTop) {
                    iTop += oAnim.iTop;
                    iTop = Math.max(oAnim.iTop, Math.min(oAnim.iBottom, iTop));

                    $bodyAndHTML.scrollTop(iTop);
                }

                ,
                scrollBy: function(iTop) {
                    iTop = iWinScrTop + iTop;
                    iTop = Math.max(oAnim.iTop, Math.min(oAnim.iBottom, iTop));

                    $bodyAndHTML.scrollTop(iTop);
                }
            }
        }

        window.scrollToSection = function(sSec, immediate) {
            var $sect = $sections.filter('#story-' + sSec),
                oData = $sect.data();
//                top = oData.iTop + ($sections[0] === $sect[0] ? 0 : iWindowHeight + 1)
// ;
console.log(oData);
            if (immediate) {
                $bodyAndHTML.scrollTop(top);
            } else {
                $bodyAndHTML.animate({
                    scrollTop: top
                }, 1000);
            }
        }

        if (sHash) {
            setTimeout(function() {
                scrollToSection(sHash.substr(1), true);
            }, 100);
        }

        /* touch move kinetics */
        kinetics = new Kinetics(window);
        window.kinetics = kinetics;
        kinetics.bind('move', function(ev, y) {
            onScroll(y);
        });


        $window
        /**
         * On resize:
         *
         * - save window height for onscroll calculations
         * - re-calculate the height of all the <section> elements
         * - adjust top position so that it's at the same %, not same px
         **/
            .bind('resize', function() {
                // patch IE which keeps triggering resize events when elements are resized
                var sCurWinSize = $window.width() + 'x' + $window.height();
                if (sCurWinSize === sWinSize) {
                    return;
                }
                sWinSize = sCurWinSize;

                if (iAnimTimeout) {
                    clearTimeout(iAnimTimeout);
                }
                iAnimTimeout = setTimeout(onResize, 50);

                iWindowHeight = $window.height();
            }).trigger('resize').bind('scroll', onScrollHandler);
    };

    $.fn.prax = function(options) {
        var element = $(this);
        if (element.data('prax')) { return element.data('prax'); }
        // Pass options to plugin constructor
        var prax = new Prax(element, options);
        // Store plugin object in this element's data
        element.data('prax', prax);
    };
})(jQuery);
