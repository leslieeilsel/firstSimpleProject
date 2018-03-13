$(function() {
    M(function($) {
        var slideContainer = $('#slideContainer'),
        c = 1,
        s_w = 116 * c,
        counts_l = 0,
        counts_r = 0,
        maxCounts = slideContainer.find('li').size() - 0,
        gameOver = true,
        slideCounts = 7,
        sTimer;
        $('#F-arrow-box img').bind('click',
        function() {
            clearInterval(sTimer);
            if (gameOver) {
                gameOver = false;
                counts_l++;
                slideContainer.animate({
                    left: '+=' + s_w
                },
                500,
                function() {
                    gameOver = true;
                    slideContainer.animate({
                        left: '-=' + s_w
                    },
                    0);
                    var html = '';
                    slideContainer.find('li:gt(' + (maxCounts - c - 1) + ')').each(function() {
                        html += '<li>' + $(this).html() + '</li>';
                    });
                    slideContainer.find('li:gt(' + (maxCounts - c - 1) + ')').remove();
                    slideContainer.html(html + slideContainer.html());
                });
            }
        });
        $('#S-arrow-box img').bind('click',
        function() {
            clearInterval(sTimer);
            link_next_event();
        });

        function link_next_event() {
            if (gameOver) {
                gameOver = false;
                counts_r++;
                slideContainer.animate({
                    left: '-=' + s_w
                },
                500,
                function() {
                    gameOver = true;
                    slideContainer.animate({
                        left: '+=' + s_w
                    },
                    0);
                    slideContainer.find('li:lt(' + c + ')').clone().appendTo(slideContainer);
                    slideContainer.find('li:lt(' + c + ')').remove();
                });
            }
        }
        lastCLiHtml();
        slideContainer.find('li:gt(' + (maxCounts - 1) + ')').remove();
        function lastCLiHtml() {
            var html = '';
            slideContainer.find('li:gt(' + (maxCounts - c - 1) + ')').each(function() {
                html += '<li>' + $(this).html() + '</li>';
            });
            slideContainer.html(html + slideContainer.html()).css({
                'margin-left': -s_w + 'px'
            });
        }
        var l_hover = false,
        m_hover = false,
        r_hover = false;
        $('#middle-slide-box').bind({
            'mouseover': function() {
                m_hover = true;
                clearInterval(sTimer);
            },
            'mouseout': function() {
                m_hover = false;
                isStartGo();
            }
        });
        $('#S-arrow-box, #F-arrow-box').bind('mouseout',
        function() {
            l_hover = false;
            r_hover = false;
            isStartGo();
        }) ;
		$('#S-arrow-box, #F-arrow-box').bind('mouseover',
        function() {
            l_hover = true;
            r_hover = true;
            clearInterval(sTimer);
        }) ;
		setInverterTimer();
        function setInverterTimer() {
            clearInterval(sTimer);
            sTimer = setInterval(function() {
                link_next_event();
            },
            1500);
        }
        function isStartGo() {
            var st = setTimeout(function() {
                if (!l_hover && !m_hover && !r_hover) {
                    setInverterTimer();
                }
            },
            1000);
        }
        //c的值为每次滚动数
        var slideContainer1 = $('#sCont'),
        c1 = 1,
        s_w1 = 116 * c,
        counts_l1 = 0,
        counts_r1 = 0,
        maxCounts1 = slideContainer1.find('li').size() - 0,
        gameOver1 = true,
        slideCounts1 = 7,
        sTimer1;
        $('#L-arrow img').bind('click',
        function() {
            clearInterval(sTimer1);
            if (gameOver1) {
                gameOver1 = false;
                counts_l1++;
                slideContainer1.animate({
                    left: '+=' + s_w
                },
                500,
                function() {
                    gameOver1 = true;
                    slideContainer1.animate({
                        left: '-=' + s_w
                    },
                    0);
                    var html = '';
                    slideContainer1.find('li:gt(' + (maxCounts1 - c - 1) + ')').each(function() {
                        html += '<li>' + $(this).html() + '</li>';
                    });
                    slideContainer1.find('li:gt(' + (maxCounts1 - c - 1) + ')').remove();
                    slideContainer1.html(html + slideContainer1.html());
                });
            }
        });
        $('#R-arrow img').bind('click',
        function() {
            clearInterval(sTimer1);
            link_next_event1();
        });
        function link_next_event1() {
            if (gameOver1) {
                gameOver1 = false;
                counts_r1++;
                slideContainer1.animate({
                    left: '-=' + s_w
                },
                500,
                function() {
                    gameOver1 = true;
                    slideContainer1.animate({
                        left: '+=' + s_w1
                    },
                    0);
                    slideContainer1.find('li:lt(' + c + ')').clone().appendTo(slideContainer1);
                    slideContainer1.find('li:lt(' + c + ')').remove();
                });
            }
        }
        lastCLiHtml1();
        slideContainer1.find('li:gt(' + (maxCounts1 - 1) + ')').remove();
        function lastCLiHtml1() {
            var html = '';
            slideContainer1.find('li:gt(' + (maxCounts1 - c - 1) + ')').each(function() {
                html += '<li>' + $(this).html() + '</li>';
            });
            slideContainer1.html(html + slideContainer1.html()).css({
                'margin-left': -s_w1 + 'px'
            });
        }
        //Jq
        /*********************/
        $('.R-box').hover(function() {
            $(this).find('.hidden-content').hide().stop().show(300);
            $(this).find('.R-title').stop().animate({
                marginTop: '-30px',
                fontSize: '20px'
            });
            $(this).find('.dd-img').stop().animate({
                marginTop: '-30px'
            })
        },function(){
            $(this).find('.hidden-content').hide().stop().hide(300);
            $(this).find('.R-title').stop().animate({
                marginTop: '0px',
                fontSize: '18px'
            });
            $(this).find('.dd-img').stop().animate({
                marginTop: '0px'
            });
        })
    });

});