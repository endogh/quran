
document.addEventListener("DOMContentLoaded", function () {
    const body = document.body;
    const themeIcon = document.getElementById("theme-icon");
    const namaSurah = document.getElementById("namaSurah");
    const listSurah = document.getElementById("listSurah");
    //const surahContainer = document.getElementById("surahContainer");

    function applyTheme(theme) {
        if (theme === "light") {
            body.classList.add("light-mode");
            themeIcon.src = "./images/light_mode.png";

            if (namaSurah) {
                namaSurah.classList.remove("text-white");
                namaSurah.classList.add("text-dark");
            }
            // if (listSurah) {
            //     listSurah.classList.remove("bg-softblue");
            //     listSurah.classList.add("bg-warm");
            // }

            if (listSurah) {
                listSurah.querySelectorAll("div").forEach(div => {
                    div.classList.remove("text-white", "bg-softblue");
                    div.classList.add("text-dark", "bg-warm");
                });
            }

        } else {
            body.classList.remove("light-mode");
            themeIcon.src = "./images/dark_mode.png";

            if (namaSurah) {
                namaSurah.classList.remove("text-dark");
                namaSurah.classList.add("text-white");
            }
            // if (listSurah) {
            //     listSurah.classList.remove("bg-warm");
            //     listSurah.classList.add("bg-softblue");
            // }

            if (listSurah) {
                listSurah.querySelectorAll("div").forEach(div => {
                    div.classList.remove("text-dark", "bg-warm");
                    div.classList.add("text-white", "bg-softblue");
                });
            }
        }
    }

    // Cek tema tersimpan di localStorage
    const savedTheme = localStorage.getItem("theme") || "dark";
    applyTheme(savedTheme);

    document.getElementById("theme-toggle-btn").addEventListener("click", function () {
        const newTheme = body.classList.contains("light-mode") ? "dark" : "light";
        localStorage.setItem("theme", newTheme);
        applyTheme(newTheme);
    });
});

