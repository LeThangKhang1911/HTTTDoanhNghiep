let container = document.getElementById('container');
for (let i = 0; i < 120; i++) {
    let leftSakura = Math.floor(Math.random() * container.clientWidth);
    let topSakura = Math.floor(Math.random() * container.clientHeight);
    let sizeSakura = Math.floor(Math.random() * 30) + 40; //Kich thuoc hoa
    let timeSakura = Math.floor((Math.random() * 5) + 5); //Thoi gian roi
    let blurSakura = Math.floor(Math.random() * 1); //Do mo
    console.log(leftSakura)
    let div = document.createElement('div');
    div.classList.add('sakura');
    div.style.left = leftSakura + 'px';
    div.style.top = topSakura + 'px';
    div.style.width = sizeSakura + 'px';
    div.style.height = sizeSakura + 'px';
    div.style.animationDuration = timeSakura + 's';
    div.style.filter = "blur(" + blurSakura + "px)";
    container.appendChild(div);
    setTimeout(() => {
        div.remove();
    }, timeSakura * 1000);
}
