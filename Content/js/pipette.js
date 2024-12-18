// Pipette Etat
let isPipetteActive = false;
let isNotifActive = false;

function redimentionCanvasCadre(modalImage){
    const canvas = document.getElementById('canvas');
    
    // Attendre que l'image soit complètement chargée
    modalImage.onload = () => {
      // offsetWidth et offsetHeight pour obtenir la taille rendue (après CSS)
      canvas.width = modalImage.offsetWidth;
      canvas.height = modalImage.offsetHeight;
      canvas.style.position="absolute";
      canvas.style.opacity= 0;
  
      // Dessiner l'image sur le canvas
      const ctx = canvas.getContext('2d');
      ctx.drawImage(modalImage, 0, 0, canvas.width, canvas.height);
  
      canvas.addEventListener("click", recupererColorPixel)
    }
  }
  
  function recupererColorPixel(event){
    if(isPipetteActive){
      const ctx = canvas.getContext('2d');
      const rect = canvas.getBoundingClientRect();
      const x = event.clientX - rect.left;
      const y = event.clientY - rect.top;
  
      const pixelData = ctx.getImageData(x, y, 1, 1).data;
      
      pipetteEtat();
  
      affichageInfosColor(pixelData);
    }
  }
  
  function affichageInfosColor(colorPixel){
    const blockNameColor = document.getElementById('colorCodePipette');
    const blockColor = document.getElementById('colorDisplayPipette');
  
    // Animation pour afficher la notification
    showNotif();
  
    let hexColor = rgbToHex(colorPixel[0],colorPixel[1],colorPixel[2]);
    
    blockNameColor.textContent=hexColor; // Affichage name color
    blockColor.style.backgroundColor=hexColor; // Affichage color
  }
  
  function showNotif() {
    isNotifActive = true;
    const notifBlock = document.getElementById('notifCouleurPipette');
    notifBlock.style.display = "flex";
  }
  
  function rgbToHex(r, g, b) {
    const toHex = (value) => {
        value = Math.min(255, Math.max(0, value)); // Limite la valeur entre 0 et 255
        return value.toString(16).padStart(2, '0');
    };
    return "#" + [r, g, b].map(toHex).join("");
  }
  
  // Activation pipette grâce à la pipetteSmallEcran
  const pipetteSmallEcran = document.getElementById("pipetteSmallEcran");
  pipetteSmallEcran.addEventListener("click", pipetteEtat);
  
  // Fonction qui permet d'activer ou désactiver la pipette
  function pipetteEtat() {
    isPipetteActive = !isPipetteActive;
  
    const pipetteButton = document.getElementById("pipetteIcon");
    const canvas = document.getElementById('canvas');
    const notifBlock = document.getElementById('notifCouleurPipette');
  
    if (pipetteButton) {
      if(isPipetteActive){
        pipetteButton.style.color = "#808080";
        canvas.style.cursor = "crosshair";
        notifBlock.style.display = "none";
        isNotifActive = false;
      } else {
        pipetteButton.style.color = "#FFFFFF";
        canvas.style.cursor = "";
      }
    }
  }
  
  // Fonction pour créer et afficher l'icône pipette
  function createPipetteIconImagePleinEcran() {
    let modal = document.querySelector(".modal");
  
    // Vérifier si l'icône existe déjà pour éviter les doublons
    const existingIcon = document.getElementById("pipetteIcon");
    if (existingIcon) return;
  
    // Créer l'icône de la pipette
    const pipetteIcon = document.createElement("i");
    pipetteIcon.id = "pipetteIcon"; // ID unique
    pipetteIcon.className = "bi bi-eyedropper"; // Classe pour l'icône
    pipetteIcon.style.position = "absolute";
    pipetteIcon.style.top = "32px"; // Position à 20px du haut
    pipetteIcon.style.right = "80px"; // Position à 20px du côté droit
    pipetteIcon.style.fontSize = "25px"; // Taille de l'icône
    pipetteIcon.style.color = "white"; // Couleur de l'icône
    pipetteIcon.style.cursor = "pointer"; // Pour indiquer que l'icône est interactive
  
    // Ajouter l'icône dans la modale
    modal.appendChild(pipetteIcon);
  }
  
  // Responsive du canva
  function handleResize(modalImage) {
    const canvas = document.getElementById('canvas');
  
    if (modalImage) {
      canvas.width = modalImage.offsetWidth;
      canvas.height = modalImage.offsetHeight;
      
      const ctx = canvas.getContext('2d');
      ctx.drawImage(modalImage, 0, 0, canvas.width, canvas.height);
    }
  }
  
  // Ajoutez un écouteur sur l'événement resize
  window.addEventListener('resize', () => {
    const modalImage = document.querySelector('.modal img');
    if (modalImage && modalImage.src) {
      handleResize(modalImage);
    }
  });