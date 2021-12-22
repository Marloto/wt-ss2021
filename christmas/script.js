for(let i = 0; i < 50; i ++) {
    const div = document.createElement("div");
    div.classList.add("snowflake");
    div.style.height = div.style.width = (0.2 + Math.random() * 2) + "vw";
    const ini = (Math.random() * 20 - 10);
    const end = (Math.random() * 20 - 10);
    const pos = (Math.random() * 80 + 10);
    div.style.setProperty('--left', (pos) + "vw")
    div.style.setProperty('--left-ini', (pos + ini) + "vw")
    div.style.setProperty('--left-end', (pos + end) + "vw")
    div.style.setProperty('--duration', (5 + Math.random() * 10) + "s")
    div.style.setProperty('--delay', (Math.random() * 10) + "s")
    document.getElementsByClassName(Math.random() < 0.5 ? 'before' : 'after')[0].appendChild(div);
    console.log("wuff")
}
