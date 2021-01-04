const hashes = document.querySelectorAll(".hash");
const header = document.querySelector("header h1");

// Anti animation spam boolean
var headerAnim = false;

function headerTextAnimation(text) {
    // 0ms - Fade out
    header.style.opacity = 0;

    // 300ms - Fade in
    setTimeout(() => {
        header.innerHTML = text;
        header.style.opacity = 1;
    }, 300);

    // 2000ms - Fade out
    setTimeout(() => {
        header.style.opacity = 0;
    }, 2000);
  
    // 2300ms - Fade in
    setTimeout(() => {
        header.innerHTML = "Color Organizer";
        header.style.opacity = 1;
    }, 2300);
}

function promiseAnimation(text) {
    header.style.opacity = 0;

    new Promise(resolve => {
        setTimeout(() => {
            header.innerHTML = text; 
            header.style.opacity = 1;
            resolve()
        }, 300);
    })
    
    .then(() => {
        new Promise(resolve => {
            setTimeout(() => {
                header.style.opacity = 0;
                resolve()
            }, 1500);
        })
        
        .then(() => {
            new Promise(resolve => {
                setTimeout(() => {
                    header.innerHTML = "Color Organizer";
                    header.style.opacity = 1;
                    resolve()
                }, 300);
            });
        });
    });
}


async function promiseAnimationAwait(text) {
    // Anti spam
    if (headerAnim) {
        return;
    }

    headerAnim = true;

    header.style.opacity = 0;

    await new Promise(resolve => {
        setTimeout(() => {
            header.innerHTML = text; 
            header.style.opacity = 1;
            resolve();
        }, 300);
    })
    
    
    await new Promise(resolve => {
        setTimeout(() => {
            header.style.opacity = 0;
            resolve();
        }, 1500);
    });
      
        
    await new Promise(resolve => {
        setTimeout(() => {
            header.innerHTML = "Color Organizer";
            header.style.opacity = 1;
            resolve();
        }, 300);
    });

    headerAnim = false;
}


function autoCopy() {
    document.execCommand("Copy");
    promiseAnimationAwait("Copied to clipboard!");   
}


hashes.forEach(hash => {
    hash.setAttribute("onclick", "autoCopy();")
});