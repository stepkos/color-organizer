const hashes = document.querySelectorAll(".hash");
const header = document.querySelector("header h1");


function autoCopy() {
    document.execCommand("Copy");
    var oldContent = header.innerHTML;

    header.style.opacity = 0;
    // 200
    setTimeout(() => {
        header.innerHTML = "Copied to clipboard!";
        header.style.opacity = 1;
    }, 300);

    // 400
    setTimeout(() => {
        header.style.opacity = 0;
    }, 2000);
  
    setTimeout(() => {
        header.innerHTML = oldContent;
        header.style.opacity = 1;
    }, 2300);
}


hashes.forEach(hash => {
    hash.setAttribute("onclick", "autoCopy();")
});