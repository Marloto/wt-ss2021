let dialogEl = document.querySelector("#dialog");
let dialogModal = new bootstrap.Modal(dialogEl, {});

function updateDialog(id) {
    let contEl = findMeme(id);
    if(contEl) {
        let imgEl = contEl.querySelector("img");
        let lowerEl = contEl.querySelector("div.lower");
        let upperEl = contEl.querySelector("div.upper");

        let memeUrl = dialogEl.querySelector("#memeUrl")
        let upperText = dialogEl.querySelector("#upperText")
        let lowerText = dialogEl.querySelector("#lowerText")
        let entryId = dialogEl.querySelector("#entryId")
        let title = dialogEl.querySelector("h5")
        let deleteButton = document.getElementById("delete")
        
        deleteButton.style.display = undefined;
        title.textContent = "Update Meme";
        memeUrl.value = imgEl.src;
        upperText.value = upperEl.textContent;
        lowerText.value = lowerEl.textContent;
        entryId.value = id;

        dialogModal.show();
    }
}

function createDialog() {
    let memeUrl = dialogEl.querySelector("#memeUrl")
    let upperText = dialogEl.querySelector("#upperText")
    let lowerText = dialogEl.querySelector("#lowerText")
    let entryId = dialogEl.querySelector("#entryId")
    let title = dialogEl.querySelector("h5")
    let deleteButton = document.getElementById("delete")
    
    deleteButton.style.display = 'none';
    title.textContent = "Create Meme";
    memeUrl.value = "";
    upperText.value = "";
    lowerText.value = "";
    entryId.value = -1;

    dialogModal.show();
}

function createMeme(id, url, upper, lower) {
    let contEl = document.createElement("div");
    let memeEl = document.createElement("div");
    let imgEl = document.createElement("img");
    let lowerEl = document.createElement("div");
    let upperEl = document.createElement("div");

    contEl.classList.add("col");
    memeEl.classList.add("meme");
    imgEl.classList.add("rounded-3");
    lowerEl.classList.add("upper");
    upperEl.classList.add("lower");

    contEl.id = "meme" + id;
    
    memeEl.appendChild(imgEl);
    memeEl.appendChild(lowerEl);
    memeEl.appendChild(upperEl);
    contEl.appendChild(memeEl);
    document.getElementById("target").appendChild(contEl);

    updateMeme(id, url, upper, lower);

    memeEl.addEventListener('click', () => {
        updateDialog(id);
    })

    return contEl;
}

function updateMeme(id, url, upper, lower) {
    let contEl = findMeme(id);
    if(contEl) {
        let imgEl = contEl.querySelector("img");
        let lowerEl = contEl.querySelector("div.lower");
        let upperEl = contEl.querySelector("div.upper");
        
        imgEl.src = url;
        upperEl.textContent = upper;
        lowerEl.textContent = lower;
    }
}

function findMeme(id) {
    return document.getElementById("meme" + id);
}

function load() {
    let xml = new XMLHttpRequest();
    xml.onreadystatechange = () => {
        if(xml.readyState == 4) {
            let data = JSON.parse(xml.responseText);

            let memes = document.getElementsByClassName('meme');
            for(let i = memes.length - 1; i >= 0; i --) {
                memes[i].parentElement.classList.add('marked');
            }

            for(let el of data) {
                let memeEl = findMeme(el.id);
                if(memeEl) {
                    memeEl.classList.remove('marked');
                    updateMeme(el.id, el.memeUrl, el.upperText, el.lowerText);
                } else {
                    createMeme(el.id, el.memeUrl, el.upperText, el.lowerText);
                }
            }

            memes = document.querySelectorAll('.marked');
            for(let i = memes.length - 1; i >= 0; i --) {
                memes[i].parentElement.removeChild(memes[i]);
            }
        }
    };
    // TODO add xml.open
    //     was müsste open hier verwenden?
    //xml.open("GET", "http://localhost/memes/meme", true);
    xml.open("GET", "meme/", true);
    
    xml.send();
}

window.addEventListener('load', () => {
    load();
})

document.getElementById("delete").addEventListener("click", () => {
    let entryIdField = dialogEl.querySelector("#entryId")
    let xml = new XMLHttpRequest();
    xml.onreadystatechange = () => {
        if(xml.readyState == 4) {
            load();
        }
    };
    // TODO add xml.open
    xml.open("DELETE", "meme/" + entryIdField.value, true);
    
    xml.send();
})

document.getElementById("create").addEventListener("click", () => {
    createDialog();
})

document.getElementById("save").addEventListener("click", () => {
    let memeUrlField = dialogEl.querySelector("#memeUrl")
    let upperTextField = dialogEl.querySelector("#upperText")
    let lowerTextField = dialogEl.querySelector("#lowerText")
    let entryIdField = dialogEl.querySelector("#entryId")
    
    let xml = new XMLHttpRequest();
    xml.onreadystatechange = () => {
        if(xml.readyState == 4) {
            load();
        }
    };

    let id = parseInt(entryIdField.value);
    let memeUrl = memeUrlField.value;
    let upperText = upperTextField.value;
    let lowerText = lowerTextField.value;
    if(memeUrl && lowerText && upperText) {
        dialogModal.hide();
        let data = {
            memeUrl,
            upperText,
            lowerText
        };
        if(id == -1) {
            // TODO add xml.open
            xml.open("POST", "meme/", true);
        } else {
            // TODO add xml.open
            xml.open("PUT", "meme/" + entryIdField.value, true);
        }
        xml.setRequestHeader("content-type", "application/json");
        xml.send(JSON.stringify(data));
    }
})