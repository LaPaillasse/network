window.onload = function() { 
  document.getElementById('svg_line').onload = init();
  function init()
  {
        chemin=document.getElementById('line1');
        longueur=Math.round(chemin.getTotalLength());
        chemin.setAttribute('stroke-dasharray',longueur.toString()+","+longueur.toString());
        chemin.setAttribute('stroke-dashoffset',longueur.toString());
        obj=document.getElementById('a1');
        obj.setAttribute('from',longueur.toString());

        chemin=document.getElementById('line5');
        longueur=chemin.getTotalLength();
        chemin.setAttribute('stroke-dasharray',longueur.toString()+","+longueur.toString());
        chemin.setAttribute('stroke-dashoffset',longueur.toString());
        obj=document.getElementById('a5');
        obj.setAttribute('from',longueur.toString());

        chemin=document.getElementById('line2');
        longueur=chemin.getTotalLength();
        chemin.setAttribute('stroke-dasharray',longueur.toString()+","+longueur.toString());
        chemin.setAttribute('stroke-dashoffset',longueur.toString());
        obj=document.getElementById('a2');
        obj.setAttribute('from',longueur.toString());

        chemin=document.getElementById('line3');
        longueur=chemin.getTotalLength();
        chemin.setAttribute('stroke-dasharray',longueur.toString()+","+longueur.toString());
        chemin.setAttribute('stroke-dashoffset',longueur.toString());
        obj=document.getElementById('a3');
        obj.setAttribute('from',longueur.toString());

        chemin=document.getElementById('line4');
        longueur=chemin.getTotalLength();
        chemin.setAttribute('stroke-dasharray',longueur.toString()+","+longueur.toString());
        chemin.setAttribute('stroke-dashoffset',longueur.toString());
        obj=document.getElementById('a4');
        obj.setAttribute('from',longueur.toString());

        chemin=document.getElementById('line6');
        longueur=chemin.getTotalLength();
        chemin.setAttribute('stroke-dasharray',longueur.toString()+","+longueur.toString());
        chemin.setAttribute('stroke-dashoffset',longueur.toString());
        obj=document.getElementById('a6');
        obj.setAttribute('from',longueur.toString());

        circleFumeeLoop_stop = true;
        circleFumeeLoop(72, 280, colorGr);

        var t4 = setTimeout(function(){
          fiole2.animate({fill : colorDv},1000);
        },4000);


        var t8bis;
        var t8 = setTimeout(function(){
          ballon2.animate({fill : colorGd},1000);
          circleFumeeLoop_stop = false;
          t8bis = setTimeout(function(){
            circleFumeeLoop_stop = true;
            circleFumeeLoop(355, 305, colorGd);
          },101);
        },8000);

        var t132 = setTimeout(function(){
          goutte_anim_stop = true;
          goutte2.attr({fill : colorGd});
          goutte3.attr({fill : colorGd});
          goutte4.attr({fill : colorGd});
          goutte_anim(goutte2, 450);
          goutte_anim(goutte3, 900);
          goutte_anim(goutte4, 0);
        },13200);

        var t138 = setTimeout(function(){
          ballon_anim_stop = true;
          ballon_anim(ballon3);
        },13850);

        var t16 = setTimeout(function(){
          fiole2.animate({fill : colorGr},2000);
          gradient_anim_pause = true;
          gradient_anim(fiole1);
        },16000);

        var t19bis;
        var t19 = setTimeout(function(){
          ballon2.animate({fill : colorDv},1000);
          circleFumeeLoop_stop = false;
          t19bis = setTimeout(function(){
            circleFumeeLoop_stop = true;
          },101);

        },19000);

        var t24 = setTimeout(function(){
          if(gradient_anim_level <100)
          {
            goutte_anim_stop = false;
            gradient_anim_pause = false;
            ballon_anim_stop = false;
            goutte2.attr({fill : 'none'});
            goutte3.attr({fill : 'none'});
            goutte4.attr({fill : 'none'});
            
            circleFumeeLoop_stop = false;
            clearTimeout(t4);
            clearTimeout(t8);
            clearTimeout(t8bis);
            clearTimeout(t132);
            clearTimeout(t138);
            clearTimeout(t16);
            clearTimeout(t19);
            clearTimeout(t19bis);
            $('#canvas_line1').replaceWith('<div id="canvas_line1">'+svgContent+'</div>');
            $('#svg_line').onload = init();
          }
          if (gradient_anim_level >= 100) {
            replayCircle1.show();
            replayLine.show().animate(
              {path:'M77.521,376.605L76.521,408'
            },200, 'ease', function(){
                replayLine.animate({path:'M77.521,376.605L76.576,408L87.017,417.25'
                },200, 'ease', function(){
                  replayText.show();
                  replayCircle2.show();
                }
              )
            });
            flamme.attr({cursor : 'pointer'});
            flamme2.attr({cursor : 'pointer'});
            flamme.hover(replayHoverIn, replayHoverOut);
            flamme2.hover(replayHoverIn, replayHoverOut);
            replayText.hover(replayHoverIn, replayHoverOut);

            replayText.attr({cursor : 'pointer'});
            goutte_anim_stop = false;
            gradient_anim_pause = false;
            ballon_anim_stop = false;
            goutte2.attr({fill : 'none'});
            goutte3.attr({fill : 'none'});
            goutte4.attr({fill : 'none'});
            circleFumeeLoop_stop = false;
            bocal_anim_stop = false;
            flamme_anim_stop = false;
            flamme.attr({fill : '#c1c1c1'});
            flamme2.attr({fill : '#c1c1c1'});

            $('#canvas_line1').replaceWith('<div id="canvas_line1"></div>');
            flamme.click(replayAnim);
            flamme2.click(replayAnim);
            replayText.click(replayAnim);
          }
        },24000);
      }


  var S = new Raphael(document.getElementById('canvas_container'), 500, 600);
  var S2 = new Raphael(document.getElementById('canvas_line_back'), 500, 400);

  var colorStr = '#393A39';
  var colorGd = '#EB562C';
  var colorGr = '#fa3958';
  var colorDv = '#0ec8b0';

  //Main schema, no animation
  //Line
  var line1 = S2.path('M80.193,227.11v-48.02c0-2.209,1.869-4,4.176-4h18.648c2.306,0,4.176,1.791,4.176,4v14.625v24.54h0.068c0,3.927,3.184,7.111,7.111,7.111s7.111-3.184,7.111-7.111l-0.097-38.442c0-3.928,3.185-7.112,7.112-7.112c3.927,0,7.111,3.184,7.111,7.112l-0.142,38.442c0,3.927,3.185,7.111,7.112,7.111c3.927,0,7.111-3.184,7.111-7.111l-0.029-38.442c0-3.928,3.185-7.112,7.112-7.112c3.927,0,7.111,3.184,7.111,7.112l-0.142,38.442c0,3.927,3.185,7.111,7.112,7.111c3.927,0,7.111-3.184,7.111-7.111v-38.442c0-3.928,3.184-7.112,7.112-7.112c3.927,0,7.111,3.184,7.111,7.112l-0.141,38.442c0,3.927,3.184,7.111,7.112,7.111c3.927,0,7.111-3.184,7.111-7.111v-38.165v-1.125c0-2.209,1.87-4,4.176-4h18.648c2.306,0,4.176,1.791,4.176,4v14.625v112.188').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var line2 = S2.path('M259.73,317.604L300.209,277.125L300.304,277.061L314.467,277.125L315.262,277.125L331.936,293.8').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var line3 = S2.path('M364.125,266.366L364.125,46.667L371.729,39.062L463,54L463,66.667').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  //fiole 1
  var elem1 = S.path('M87.257,262.388v-29.317H75.132v29.317c-11.991,2.752-20.938,13.482-20.938,26.308c0,14.912,12.088,27,27,27s27-12.088,27-27C108.195,275.87,99.248,265.14,87.257,262.388z').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});
  var elem2 = S.path('M69.82 233.071L92.57 233.071').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});
  var elem3 = S.circle('28.445', '243.489', '4.313').attr({fill : colorGd, stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});
  var elem4 = S.circle('14.093','257.792','4.313').attr({fill : colorGd, stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});
  var elem5 = S.path('M17.143 254.792L25.396 246.539').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});
  var elem6 = S.path('M32.757 243.491L92.57 243.491').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});
  var elem7 = S.path('M14.078 262.153L14.078 382.696').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});
  var elem8 = S.path('M6.58 382.696L119.414 382.696').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});
  var elem9 = S.path('M89.017 382.849L103.368 368.497').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});
  var elem10 = S.path('M66.997 382.849L52.646 368.497').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});
  var elem11 = S.path('M88.382,232.071c0,0.552-0.448,1-1,1H75.007c-0.552,0-1-0.448-1-1v-6.812c0-0.552,0.448-1,1-1h12.375c0.552,0,1,0.448,1,1V232.071z').attr({fill : colorGd, stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});


  //fiole 2
  var elem15 = S.path('M276.131,370.712L276,370.548l-25.169-38.505l10.379-10.379c0.854-0.853,0.854-2.236,0-3.089l-3.089-3.089c-0.854-0.853-2.236-0.853-3.089,0l-7.479,7.48v-24.939h4.411c1.206,0,2.185-0.979,2.185-2.184v-5.43c0-1.206-0.979-2.184-2.185-2.184H215.38c-1.206,0-2.185,0.978-2.185,2.184v5.43c0,1.206,0.979,2.184,2.185,2.184h3.7v29l-28.447,43.521l-0.131,0.164c-2.217,2.902-1.999,7.068,0.654,9.721c1.529,1.529,3.562,2.25,5.566,2.16l0.115,0.008h72.958l0.114-0.008c2.004,0.09,4.037-0.631,5.567-2.16C278.131,377.78,278.348,373.614,276.131,370.712z').attr({fill : '#ffffff', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem12 = S.path('M244.198,288.229L251.115,275.335L217.018,275.335L223.691,288.229').attr({fill : colorGd, stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem14 = S.path('M243.393,242.639c0,1.205-1.344,2.182-3,2.182h-14.625c-1.656,0-3-0.978-3-2.182v-10.636c0-1.206,1.344-2.182,3-2.182h14.625c1.656,0,3,0.977,3,2.182V242.639z').attr({fill : colorGd, stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem16 = S.circle('227.039', '281.782', '0.125').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem17 = S.circle('235.746','277.363','0.125').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem18 = S.circle('237.79','284.534','0.125').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem19 = S.path('M242.021,292.96L242.021,300.332L225.367,300.332L225.367,292.96').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  

  //fiole 3
  var elem20 = S.path('M396.723 382.601L411.408 382.601').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem21 = S.path('M370.613,275.229L375.33,266.437L352.08,266.437L356.631,275.229').attr({fill : colorGd, stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem22 = S.path('M369.59,288.19v-12.855h-12.125v12.855c-5.926,1.36-11.102,4.672-14.827,9.218l-5.45-5.451c-1.172-1.171-3.072-1.171-4.243,0l-2.829,2.829c-1.171,1.171-1.171,3.071,0,4.243l7.602,7.601c-0.76,2.492-1.189,5.127-1.189,7.868c0,14.912,12.088,27,27,27c14.911,0,27-12.088,27-27C390.527,301.672,381.58,290.943,369.59,288.19z').attr({fill : '#ffffff', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem23 = S.path('M315.83 382.601L330.516 382.601').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem24 = S.path('M390.179 318.883L403.283 382.601').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem26 = S.path('M337.065 319.883L323.973 382.601').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});


  //fiole 4
  var elem27 = S.path('M469.018,111.649L472.952,104.314L453.556,104.314L457.353,111.649').attr({fill : colorGd, stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem28 = S.path('M457.045,93.902v9.836h12.416v-9.835c4.424-2.262,7.459-6.854,7.459-12.165c0-7.548-6.119-13.667-13.666-13.667c-7.548,0-13.667,6.119-13.667,13.667C449.587,87.048,452.621,91.64,457.045,93.902z').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem29 = S.circle('451.451','284.533','4.312').attr({fill : colorGd, stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem30 = S.path('M493.42,156.981c0-13.743-9.193-25.331-21.763-28.971v-15.695h-16.806v15.695c-12.57,3.64-21.764,15.228-21.764,28.971c0,14.011,9.553,25.788,22.5,29.18v77.82c0,3.365,2.171,6.216,5.187,7.248h-0.001l2.48,27.043l2.479-27.043c3.015-1.032,5.187-3.883,5.187-7.248v-77.819h-0.003C483.865,182.771,493.42,170.993,493.42,156.981z').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem31 = S.path('M456.598 284.533L471.283 284.533').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem32 = S.path('M455.74 205.294L462.58 205.294').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem33 = S.path('M455.74 214.238L462.58 214.238').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem34 = S.path('M455.74 223.181L462.58 223.181').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem35 = S.path('M455.74 232.125L462.58 232.125').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem36 = S.path('M455.74 241.068L462.58 241.068').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem37 = S.path('M455.74 250.011L462.58 250.011').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem38 = S.path('M472.472,315.291v15.5l16,45.834c0,0,3.167,7-5,7s-19.667,0-19.667,0h0.271c0,0-11.5,0-19.667,0s-5-7-5-7l16-45.834v-15.5l-4.542-6.874h25.25L472.472,315.291z').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round'});


  //Animate element position
  var flamme = S.path('M18.999,22.168c-0.269,5.197-4.323,9.032-9.711,8.754c-5.389-0.279-9.612-4.724-9.269-9.917C0.783,9.476,11.247-4.142,10.438,1.193C8.973,10.873,19.269,16.969,18.999,22.168z').attr({fill : colorGd, stroke : 'none', transform : 't68,342'});
  var flamme2 = S.path('M18.999,22.168c-0.269,5.197-4.323,9.032-9.711,8.754c-5.389-0.279-9.612-4.724-9.269-9.917C0.783,9.476,11.247-4.142,10.438,1.193C8.973,10.873,19.269,16.969,18.999,22.168z').attr({fill : colorGd, stroke : 'none', transform : 't72,342s0.5,0.5'});
  var ballon1 = S.path('M41.833,9.837c0-2.741-0.527-5.357-1.484-7.755c0,0-0.072,1.122-6.592,1.668C28.3,4.207,25.048,4.267,21.339,3.28c-4.438-0.662-4.914-2.184-10.216-2.807c-4.18-0.491-9.639,1.609-9.639,1.609C0.526,4.479,0,7.096,0,9.837c0,11.552,9.365,20.917,20.917,20.917S41.833,21.389,41.833,9.837c0-2.458-0.424-4.816-1.203-7.007').attr({fill : colorGr, stroke :'none', transform : 't60,280'});
  var ballon2 = S.path('M41.833,9.837c0-2.741-0.527-5.357-1.484-7.755c0,0-0.072,1.122-6.592,1.668C28.3,4.207,25.048,4.267,21.339,3.28c-4.438-0.662-4.914-2.184-10.216-2.807c-4.18-0.491-9.639,1.609-9.639,1.609C0.526,4.479,0,7.096,0,9.837c0,11.552,9.365,20.917,20.917,20.917S41.833,21.389,41.833,9.837c0-2.458-0.424-4.816-1.203-7.007').attr({fill : colorDv, stroke :'none', transform : 't343,305'});
  var ballon3 = S.path('M43.67,6.488c0-2.051-0.284-4.035-0.812-5.917c-0.209-0.743-5.432-0.002-10.465,0.066c-4.731,0.064-6.154,0.26-10.559,0.26s-4.231-0.169-10.559-0.26C6.544,0.57,1.714-0.167,0.949,0.101C0.461,1.915,0,4.52,0,6.488c0,12.059,9.776,21.835,21.834,21.835C33.894,28.323,43.67,18.547,43.67,6.488').attr({fill : colorGd, stroke :'none', transform : 't441,151s1.1'});
  var fiole1 = S.path('M470.033,342.1l10.641,30.48c0,0,2.106,4.655-3.324,4.655c-5.432,0-13.08,0-13.08,0h0.182c0,0-7.648,0-13.08,0c-5.431,0-3.324-4.655-3.324-4.655l10.64-30.48H470.033z').attr({fill : "90-#EB562C-#EB562C:0-#fff:1-#fff", stroke :'none'});
  var fiole2 = S.path('M254.438,349.984l10.767,16.471l0.096,0.121c1.635,2.139,1.474,5.211-0.482,7.167c-1.128,1.127-2.626,1.659-4.104,1.593l-0.084,0.006h-53.787l-0.084-0.006c-1.478,0.066-2.976-0.465-4.104-1.593c-1.956-1.956-2.117-5.028-0.482-7.167l0.096-0.121l10.76-16.459L254.438,349.984z').attr({fill : colorGr, stroke :'none'});
  var goutte2 = S.path('M34.424,18.917c0,1.519-1.231,2.749-2.75,2.749c-1.518,0-2.749-1.23-2.749-2.749c0,0,0.769-4.57,2.749-6.551C32.564,13.983,34.424,17.862,34.424,18.917z').attr({fill : 'none', stroke :'none', transform : 't431,60'});
  var goutte3 = S.path('M34.424,18.917c0,1.519-1.231,2.749-2.75,2.749c-1.518,0-2.749-1.23-2.749-2.749c0,0,0.769-4.57,2.749-6.551C32.564,13.983,34.424,17.862,34.424,18.917z').attr({fill : 'none', stroke :'none', transform : 't431,60'});
  var goutte4 = S.path('M34.424,18.917c0,1.519-1.231,2.749-2.75,2.749c-1.518,0-2.749-1.23-2.749-2.749c0,0,0.769-4.57,2.749-6.551C32.564,13.983,34.424,17.862,34.424,18.917z').attr({fill : 'none', stroke :'none', transform : 't431,60'});
  
  //replay elements
  var replayText = S.text(170, 416.25, 'Relancer le processus').attr({'font-family' :'Arial', 'font-size' : '16', 'font-weight' : '400', fill : colorGd}).hide();
  var replayLine = S.path('M77.521,376.605L77.522,376.605').hide();
  var replayCircle1 = S.circle('77.521', '376.605',1.5).attr({fill : '#000000', stroke : 'none'}).hide();
  var replayCircle2 = S.circle('87.017', '417.25',1.5).attr({fill : '#000000', stroke : 'none'}).hide();
  
  //bring to front 
  var elem25 = S.path('M331.516 319.883L396.08 319.883').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  var elem13 = S.rect('229.6', '300.332', '8.19', '59.335').attr({fill : 'none', stroke : colorStr, 'stroke-width':3, 'stroke-linecap' : 'round', 'stroke-linejoin' : 'round'});
  
  //Animation fumée
  var nbrCircle = 0;
  var goCircle = false;
  var circleFumee = [];
  var circleFumeeLoop_stop = true;
  function circleFumeeLoop (posX, posY,color) {
    if(!circleFumeeLoop_stop) {
      return;
    }
     setTimeout(function () {
        var x = Math.floor((Math.random()*20)+posX);
        var y = posY;
        var diam = Math.floor((Math.random()*3)+2)
        circleFumee[nbrCircle] = S.circle(x, y, diam).attr({fill : color, stroke : 'none'});
        circleFumee[nbrCircle].animate({transform : "t0,-10"}, 400);
        circleFumee[nbrCircle].animate({opacity : '0'}, 400);

        nbrCircle++;

        if (circleFumee[nbrCircle-5] && !goCircle)
        {
          circleFumee[nbrCircle-5].remove();
        }
        else if(goCircle)
        {
          circleFumee[10-nbrCircle].remove();
        }
        if (nbrCircle == 10) {
          nbrCircle = 0;
          goCircle = true;
        }
        if (nbrCircle < 10)
        {
           circleFumeeLoop(posX, posY,color);
        }
     }, 100);
  }
  circleFumeeLoop(72, 280, colorGr);
  
  //animation ballon 3
  var ballon_anim_stop = true;
  var ballon_anim = function(e) {
    var time = 100;

    function first() {
        e.animate({path : "M43.67,6.488c0-2.051-0.284-4.035-0.812-5.917c-0.209-0.743-5.432-0.002-10.465,0.066c-4.731,0.064-6.154,0.26-10.559,0.26s-4.231-0.169-10.559-0.26C6.544,0.57,1.714-0.167,0.949,0.101C0.461,1.915,0,4.52,0,6.488c0,12.059,9.776,21.835,21.834,21.835C33.894,28.323,43.67,18.547,43.67,6.488"}, 50, firstbis);
    }
    function firstbis() {
      if(ballon_anim_stop) {
        e.animate({path : "M43.67,6.488c0-2.051-0.284-4.035-0.812-5.917c-0.209-0.743-5.432-0.002-10.465,0.066c-4.731,0.064-6.154,0.26-10.559,0.26s-4.231-0.169-10.559-0.26C6.544,0.57,1.714-0.167,0.949,0.101C0.461,1.915,0,4.52,0,6.488c0,12.059,9.776,21.835,21.834,21.835C33.894,28.323,43.67,18.547,43.67,6.488"}, 50, second);
      }
    }
    function second() {
      e.animate({path : "M43.67,7.008c0-2.051-0.284-4.035-0.812-5.917c-0.209-0.743-6.158,1.028-10.465-0.934c-4.306-1.962-6.154,1.26-10.559,1.26s-6.252-3.222-10.559-1.26C6.97,2.119,0.97,0.497,0.748,1.319C0.26,3.133,0,5.04,0,7.008c0,12.059,9.776,21.835,21.834,21.835C33.894,28.843,43.67,19.066,43.67,7.008"}, 50, third);
    }
    function third() {
      e.animate({path : "M43.67,7.226c0-2.051-0.283-4.035-0.812-5.917c-0.209-0.743-6.158,1.028-10.465-0.934c-4.305-1.962-6.154,1.26-10.558,1.26c-4.404,0-6.252-3.222-10.559-1.26C6.97,2.337,0.97,0.714,0.749,1.537C0.26,3.351,0,5.257,0,7.226c0,12.058,9.776,21.835,21.834,21.835C33.895,29.061,43.67,19.283,43.67,7.22"}, 50, four);
    }
    function four() {
      e.animate({path : "M43.67,7.007c0-2.467-0.41-4.837-1.164-7.049c-0.121-0.354-8.807,2.16-13.113,0.198c-4.306-1.962-3.154,1.26-7.559,1.26s-3.252-3.222-7.559-1.26C9.97,2.118,1.18-0.11,1.021,0.392C0.357,2.478,0,4.7,0,7.007c0,12.059,9.776,21.836,21.834,21.836C33.894,28.843,43.67,19.065,43.67,7.007c0-2.565-0.442-5.027-1.256-7.314"}, 100, five);
    }
    function five() {
      e.animate({path : "M43.67,7.312c0-2.861-0.551-5.593-1.552-8.095c0,0-5.419,3.207-9.726,1.244c-4.306-1.962-6.154,1.26-10.559,1.26s-6.252-3.222-10.559-1.26C6.97,2.424,1.55-0.783,1.55-0.783C0.55,1.72,0,4.452,0,7.312c0,12.059,9.776,21.835,21.834,21.835C33.894,29.147,43.67,19.371,43.67,7.312c0-2.566-0.442-5.028-1.256-7.314"}, 100, first);
    }

    first();
  }

  //ballon animation 2
  var bocal_anim_stop = true;
  var bocal_anim2 = function(e) {
    var time = 500;
    var nextFunction = function(coming){
      if(bocal_anim_stop)
      {
        var random = Math.random();
        if(random < 0.20 && coming != first) {
          return first;
        }
        else if(random >= 0.20 && random < 0.40 && coming != second) {
          return second;
        }
        else if(random >= 0.40 && random < 0.60 && coming != third) {
          return third;
        }
        else if(random >= 0.60 && random < 0.80 && coming != four) {
          return four;
        }
        else if(random >= 0.80 && random < 1 && coming != five) {
          return five;
        }
        else
        {
          nextFunction(coming);
        }
      }
      else
      {
        return;
      }
    }

    function first() {
      e.animate({path : "M41.833,9.837c0-2.741-0.527-5.357-1.484-7.755c0,0-0.072,1.122-6.592,1.668C28.3,4.207,25.048,4.267,21.339,3.28c-4.438-0.662-4.914-2.184-10.216-2.807c-4.18-0.491-9.639,1.609-9.639,1.609C0.526,4.479,0,7.096,0,9.837c0,11.552,9.365,20.917,20.917,20.917S41.833,21.389,41.833,9.837c0-2.458-0.424-4.816-1.203-7.007"}, time, nextFunction('first'));
    }
    function second() {
      e.animate({path : "M41.833,9.837c0-2.741-0.527-5.357-1.484-7.755c0,0-0.072,1.122-6.592,1.668C28.3,4.207,25.048,2.267,21.339,1.28c-4.438-0.662-4.792-0.418-10.216-0.807C6.926,0.172,1.485,2.082,1.485,2.082C0.527,4.479,0,7.096,0,9.837c0,11.552,9.365,20.917,20.917,20.917S41.833,21.389,41.833,9.837c0-2.458-0.424-4.816-1.203-7.007"}, time, nextFunction('second'));
    }
    function third() {
      e.animate({path : "M41.833,9.837c0-2.741-0.527-5.357-1.484-7.755c0,0,0.063-0.011-6.464-0.453c-5.5-0.373-8.083-0.535-12.546-0.349c-4.444,0.137-4.102,0.599-10.204,1.349c-4.177,0.514-9.65-0.547-9.65-0.547C0.527,4.479,0,7.096,0,9.837c0,11.552,9.365,20.917,20.917,20.917S41.833,21.389,41.833,9.837c0-2.458-0.424-4.816-1.203-7.007"}, time, nextFunction('third'));
    }
    function four() {
      e.animate({path : "M41.833,9.837c0-2.741-0.527-5.357-1.484-7.755c0,0,0.21-1.219-6.317-1.662c-5.5-0.373-8.146,0.22-12.646,1.292c-4.001,0.667-3.834,1.417-10.084,1.667C7.097,3.547,1.485,2.082,1.485,2.082C0.527,4.479,0,7.096,0,9.837c0,11.552,9.365,20.917,20.917,20.917S41.833,21.389,41.833,9.837c0-2.458-0.424-4.816-1.203-7.007"}, time, nextFunction('four'));
    }
    function five() {
      e.animate({path : "M41.833,9.837c0-2.741-0.527-5.357-1.484-7.755c0,0,0.147-0.928-6.38-1.37c-5.5-0.373-8.12,0.814-12.583,1c-4.444,0.137-4.148,0.167-10.251,0.917c-4.177,0.514-9.65-0.547-9.65-0.547C0.527,4.479,0,7.096,0,9.837c0,11.552,9.365,20.917,20.917,20.917S41.833,21.389,41.833,9.837c0-2.458-0.424-4.816-1.203-7.007"}, time, nextFunction('five'));
    }

    first();
  }
  bocal_anim2(ballon1);
  bocal_anim2(ballon2);


 //animatio flamme
 var flamme_anim_stop = true;
 var flamme_anim = function(e) {
  if(flamme_anim_stop)
    {
      var time = 100;
      var nextFunction = function(coming){
        if(flamme_anim_stop)
        {
          var random = Math.random();
          if(random < 0.20 && coming != first) {
            return first;
          }
          else if(random >= 0.20 && random < 0.40 && coming != second) {
            return second;
          }
          else if(random >= 0.40 && random < 0.60 && coming != third) {
            return third;
          }
          else if(random >= 0.60 && random < 0.80 && coming != four) {
            return four;
          }
          else if(random >= 0.80 && random < 1 && coming != five) {
            return five;
          }
          else
          {
            nextFunction(coming);
          }
        }
        else
        {
          return;
        }
      }

      function first() {
        e.animate({path : "M18.999,22.168c-0.269,5.197-4.323,9.032-9.711,8.754c-5.389-0.279-9.612-4.724-9.269-9.917C0.783,9.476,11.247-4.142,10.438,1.193C8.973,10.873,19.269,16.969,18.999,22.168z"}, time, nextFunction('first'));
      }
      function second() {
        e.animate({path : "M18.999,22.168c-0.269,5.197-4.323,9.032-9.711,8.754c-5.389-0.279-9.612-4.724-9.269-9.917C0.783,9.476,8.747-2.215,7.938,3.119C6.473,12.799,19.269,16.969,18.999,22.168z"}, time, nextFunction('second'));
      }
      function third() {
        e.animate({path : "M18.999,22.168c-0.269,5.197-4.323,9.032-9.711,8.754c-5.389-0.279-9.612-4.724-9.269-9.917C0.783,9.476,10.311,1.701,9.502,7.036C8.036,16.716,19.269,16.969,18.999,22.168z"}, time, nextFunction('third'));
      }
      function four() {
        e.animate({path : "M18.999,22.168c-0.269,5.197-4.323,9.032-9.711,8.754c-5.389-0.279-9.612-4.724-9.269-9.917C0.783,9.476,12.938-1.131,11.188,2.869C7.265,11.838,19.269,16.969,18.999,22.168z"}, time, nextFunction('four'));
      }
      function five() {
        e.animate({path : "M18.999,22.168c-0.269,5.197-4.323,9.032-9.711,8.754c-5.389-0.279-9.612-4.724-9.269-9.917C0.783,9.476,12.938-1.131,11.188,2.869C7.265,11.838,19.269,16.969,18.999,22.168z"}, time, nextFunction('five'));
      }

      first();
    }
    else
    {
      return;
    }
  }
  flamme_anim(flamme);
  flamme_anim(flamme2);

  //animation goutte
  var goutte_anim_stop = true;
  var goutte_anim = function(e, dec) {
    function first() {
        e.animate({transform : 't431,60'}, dec, firstbis);
    }
    function firstbis() {
      if (goutte_anim_stop) {

        e.animate({transform : 't431,160'}, 1350, second);
      }
    }
    function second() {
      e.animate({transform : 't431,60'}, 0, firstbis);
    }
    first();
  }

  //gradient animation
  var gradient_anim_pause = true;
  var gradient_anim_level = 0;
  var gradient_anim = function(e) {
    var timerGradient = setInterval(function(){

      var gradient = "90-#EB562C-#EB562C:"+gradient_anim_level+"-#fff:"+(gradient_anim_level+1)+"#fff";
      e.animate({fill:gradient},0);
      if (gradient_anim_pause) {
        gradient_anim_level++;
      }
      if (gradient_anim_level==100) {
        clearInterval(timerGradient);
      }
    },100);
  }

  function replayHoverIn()
  {
    flamme.animate({fill: colorGd},300);
    flamme2.animate({fill: colorGd},300);
    replayText.animate({fill : '#000000'},300);
  }
  function replayHoverOut()
  {
    flamme.animate({fill: '#c1c1c1'},300);
    flamme2.animate({fill: '#c1c1c1'},300);
    replayText.animate({fill : colorGd},300);
  }

  var svgContent = canvas_line1.innerHTML;
  function replayAnim()
  {
    replayText.hide();
    replayLine.hide().attr({path : 'M77.521,376.605L77.522,376.605'});
    replayCircle1.hide();
    replayCircle2.hide();
    flamme.attr({cursor : 'default'});
    flamme2.attr({cursor : 'default'});
    replayText.attr({cursor : 'default'});
    flamme.unclick(replayAnim);
    flamme2.unclick(replayAnim);
    replayText.unclick(replayAnim);
    flamme.unhover(replayHoverIn, replayHoverOut);
    flamme2.unhover(replayHoverIn, replayHoverOut);
    replayText.unhover(replayHoverIn, replayHoverOut);
    circleFumeeLoop_stop = true;
    gradient_anim_level = 0;
    fiole1.attr({fill:"90-#EB562C-#EB562C:"+gradient_anim_level+"-#fff:"+(gradient_anim_level+1)+"#fff"});
    ballon_anim_stop = true;
    bocal_anim_stop = true;
    flamme_anim_stop = true;
    flamme_anim(flamme);
    flamme_anim(flamme2);
    bocal_anim2(ballon1);
    bocal_anim2(ballon2);
    circleFumeeLoop(72, 280, colorGr);
    flamme.attr({fill : colorGd});
    flamme2.attr({fill : colorGd});
    $('#canvas_line1').replaceWith('<div id="canvas_line1">'+svgContent+'</div>');
    $('#svg_line').onload = init();
  }
}
