window.onload = function () {
    var url = [];
    url[0] = 'img00.jpg';
    url[1] = 'img01.jpg';
    url[2] = 'img02.jpg';
    url[3] = 'img03.jpg';
    url[4] = 'img04.jpg';
    url[5] = 'img05.jpg';
    url[6] = 'img06.jpg';
    url[7] = 'img07.jpg';
    url[8] = 'img08.jpg';
    url[9] = 'img09.jpg';
    url[10] = 'img10.jpg';
    url[11] = 'img11.jpg';
    url[12] = 'img12.jpg';
    url[13] = 'img13.jpg';
    url[14] = 'img14.jpg';
    url[15] = 'img15.jpg';
    url[16] = 'img16.jpg';
    url[17] = 'img17.jpg';
    url[18] = 'img18.jpg';
    url[19] = 'img19.jpg';
    url[20] = 'img20.jpg';
    url[21] = 'img21.jpg';
    url[22] = 'img22.jpg';
    url[23] = 'img23.jpg';
    url[24] = 'img24.jpg';
    url[25] = 'img25.jpg';
    url[26] = 'img26.jpg';
    url[27] = 'img27.jpg';
    url[28] = 'img28.jpg';
    url[29] = 'img29.jpg';
    url[30] = 'img30.jpg';
    url[31] = 'img31.jpg';
    url[32] = 'img32.jpg';
    url[33] = 'img33.jpg';
    url[34] = 'img34.jpg';
    url[35] = 'img35.jpg';
    var n = Math.floor(Math.random() * url.length);
    var elm = document.getElementById('main_content');
    elm.style.backgroundImage = 'url(/images/' + url[n] + ')';
}
