
/*===== SCRIPT, CHANGE OF ANNOUNCEMENT AND IMAGES OF NEWS SECTION*/
class Interfaz {
    changeAnnouncement(Announcement) {
        document.getElementById("announcement").setAttribute("src", `data:image/png;base64,${Announcement}`);
    }

    changeNews1(news1) {
        document.getElementById("news1").setAttribute("src", `data:image/png;base64,${news1}`);
    }

    changeNews2(news2) {
        document.getElementById("news2").setAttribute("src", `data:image/png;base64,${news2}`);
    }
}

document.addEventListener("DOMContentLoaded", (e) => {
    const ui = new Interfaz();

    (showPhotoPerfil = async (e) => {
        const myRequest = new Request(location.origin + "/Miranda/usuarios/showAnnouncementNews1News2");
        try {
            const response = await fetch(myRequest);
            if (!response.ok) {
                throw new error(response.statusText);
            }
            const images = await response.json();
            ui.changeAnnouncement(images.announcement)
            ui.changeNews1(images.news1)
            ui.changeNews2(images.news2)

        } catch (error) {
            alert("Error al enviar el formulario: " + error.message);
        }
    })();
})