/*====================================================
    --- SIMPLE ELEMENT TOGGLER ---
=====================================================*/
function toggleElementDisplay(id, shouldShow) {

    const element = document.getElementById(id);

    if (element) {
        element.classList.toggle("hidden", !shouldShow);
    }
}

/*====================================================
    --- DOM CONTENT LOADED ---
=====================================================*/
document.addEventListener("DOMContentLoaded", () => {

    /*====================================================
        ARTWORK PREVIEW MODAL
    =====================================================*/

    const chooseBtn = document.getElementById("choose-artwork-btn");

    const fileInput = document.getElementById("artwork-file-input");

    const artworkModal = document.getElementById("artwork-preview-modal");

    const artworkCloseBtn = document.getElementById("close-preview-modal");

    const changeBtn = document.getElementById("change-file-btn");

    const imagePreview = document.getElementById("preview-image");

    const pdfPreview = document.getElementById("preview-pdf");

    const fileName = document.getElementById("preview-file-name");

    const fileSize = document.getElementById("preview-file-size");

    if (chooseBtn && fileInput) {

        // OPEN FILE PICKER
        chooseBtn.addEventListener("click", () => {
            fileInput.click();
        });

        // FILE SELECTED
        fileInput.addEventListener("change", () => {

            const file = fileInput.files[0];

            if (!file) return;

            artworkModal.classList.remove("hidden");

            artworkModal.classList.add("flex");

            fileName.textContent = file.name;

            fileSize.textContent =
                (file.size / 1024 / 1024).toFixed(2) + " MB";

            // IMAGE
            if (file.type.startsWith("image/")) {

                imagePreview.src = URL.createObjectURL(file);

                imagePreview.classList.remove("hidden");

                pdfPreview.classList.add("hidden");
            }

            // PDF
            else if (file.type === "application/pdf") {

                imagePreview.classList.add("hidden");

                pdfPreview.classList.remove("hidden");
            }
        });

        // CLOSE MODAL
        const closeArtworkModal = () => {

            artworkModal.classList.add("hidden");

            artworkModal.classList.remove("flex");
        };

        artworkCloseBtn?.addEventListener("click", closeArtworkModal);

        // CLICK OUTSIDE
        artworkModal?.addEventListener("click", (e) => {

            if (e.target === artworkModal) {
                closeArtworkModal();
            }
        });

        // CHANGE FILE
        changeBtn?.addEventListener("click", () => {

            closeArtworkModal();

            fileInput.click();
        });
    }

    /*========================================
        CERTIFICATE MODAL
    ========================================*/

    const certificateModal = document.getElementById("certificate-modal");

    const certForm = document.getElementById("certificate-form");

    const headerCloseBtn = document.getElementById("close-modal-header-btn");

    const footerCloseBtn = document.getElementById("close-modal-footer-btn");

    const nameInput = document.getElementById("cert-full-name");

    const openModalBtn = document.querySelector(
        '[onclick*="certificate-modal"]'
    );

    const openCertificateModal = () => {

        if (!certificateModal || !nameInput) return;

        certificateModal.classList.remove("hidden");

        nameInput.focus();
    };

    const closeCertificateModal = () => {

        if (!certificateModal || !certForm) return;

        certificateModal.classList.add("hidden");

        certForm.reset();
    };

    if (openModalBtn) {

        openModalBtn.removeAttribute("onclick");

        openModalBtn.addEventListener("click", openCertificateModal);
    }

    headerCloseBtn?.addEventListener(
        "click",
        closeCertificateModal
    );

    footerCloseBtn?.addEventListener(
        "click",
        closeCertificateModal
    );

    certificateModal?.addEventListener("click", (event) => {

        if (event.target === certificateModal) {
            closeCertificateModal();
        }
    });

    certForm?.addEventListener("submit", (event) => {

        event.preventDefault();

        const participantName = nameInput.value.trim();

        if (participantName) {

            console.log(
                `Generating certificate for: ${participantName}`
            );

            closeCertificateModal();
        }
    });

});
