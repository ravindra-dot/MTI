/*====================================================
    --- STATE MANAGEMENT ---
=======================================================*/
const dashboardState = {
  paid: false,
  downloaded: false,
  uploaded: false
};
/*====================================================
    --- VIEW ROUTER CONTROLLER ---
=======================================================*/

function setUIState(state) {
  const viewEmpty = document.getElementById("view-state-empty");
  const viewWorkspace = document.getElementById("view-state-workspace");

  if (!viewEmpty || !viewWorkspace) return;

  if (state === "empty") {
    viewEmpty.classList.remove("hidden");
    viewWorkspace.classList.add("hidden");
    return;
  }

  viewEmpty.classList.add("hidden");
  viewWorkspace.classList.remove("hidden");

  dashboardState.paid = state === "paid";

  updateDashboardProgress();
  updateWorkspaceUI();
}
/*====================================================
    --- PROGRESS & ROADMAP ENGINE ---
=======================================================*/
function updateDashboardProgress() {
  const progressBar = document.getElementById("roadmap-progress-bar");

  const step2Node = document.getElementById("roadmap-step-2-node");
  const step2Icon = document.getElementById("roadmap-step-2-icon");
  const step2Text = document.getElementById("roadmap-step-2-text");
  const step2SubText = step2Node
    ?.closest(".flex-col")
    ?.querySelector("span[id$='sub']");

  const step3Node = document.getElementById("roadmap-step-3-node");
  const step3Icon = document.getElementById("roadmap-step-3-icon");
  const step3Text = document.getElementById("roadmap-step-3-text");
  const step3SubText = step3Node
    ?.closest(".flex-col")
    ?.querySelector("span[id$='sub']");

  const step4Node = document.getElementById("roadmap-step-4-node");
  const step4Icon = document.getElementById("roadmap-step-4-icon");
  const step4Text = document.getElementById("roadmap-step-4-text");
  const step4SubText = step4Node
    ?.closest(".flex-col")
    ?.querySelector("span[id$='sub']");

  let progress = 12;

  if (!dashboardState.paid) {
    progress = 12;

    if (step2Node)
      step2Node.className =
        "w-10 h-10 bg-white text-amber-500 rounded-full flex items-center justify-center border-2 border-amber-400 text-sm font-bold shadow animate-pulse";
    if (step2Icon) step2Icon.className = "fa-solid fa-circle-dot";
    if (step2Text)
      step2Text.className = "text-xs mt-2 font-bold text-amber-500";
    if (step2SubText) step2SubText.textContent = "(Pending)";

    if (step3Node)
      step3Node.className =
        "w-10 h-10 bg-white text-gray-300 rounded-full flex items-center justify-center border-2 border-gray-100 text-sm shadow-inner";
    if (step3Icon) step3Icon.className = "fa-solid fa-arrow-down";
    if (step3Text)
      step3Text.className = "text-xs mt-2 font-medium text-gray-400";
    if (step3SubText) step3SubText.textContent = "(Locked)";
  } else if (
    dashboardState.paid &&
    !dashboardState.downloaded &&
    !dashboardState.uploaded
  ) {
    progress = 37;

    // FIX: Ab yeh Step 2 ke subtext ko sahi se "(Completed)" ya "Paid" set karega
    if (step2Node)
      step2Node.className =
        "w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center border-2 border-emerald-500 text-sm font-bold shadow";
    if (step2Icon) step2Icon.className = "fa-solid fa-check";
    if (step2Text)
      step2Text.className = "text-xs mt-2 font-bold text-emerald-600";
    if (step2SubText) step2SubText.textContent = "(Completed)"; // Pehle yahan step3SubText likha tha

    if (step3Node)
      step3Node.className =
        "w-10 h-10 bg-white text-blue-600 rounded-full flex items-center justify-center border-2 border-blue-500 text-sm font-bold shadow animate-bounce";
    if (step3Icon) step3Icon.className = "fa-solid fa-arrow-down animate-pulse";
    if (step3Text) step3Text.className = "text-xs mt-2 font-bold text-blue-600";
    if (step3SubText) step3SubText.textContent = "(Awaiting Download)";

    if (step4Node)
      step4Node.className =
        "w-10 h-10 bg-white text-gray-400 rounded-full flex items-center justify-center border-2 border-gray-200 text-sm shadow-sm";
    if (step4Icon) step4Icon.className = "fa-solid fa-cloud-arrow-up";
    if (step4Text)
      step4Text.className = "text-xs mt-2 font-medium text-gray-400";
    if (step4SubText) step4SubText.textContent = "(Locked)";
  } else if (
    dashboardState.paid &&
    dashboardState.downloaded &&
    !dashboardState.uploaded
  ) {
    progress = 62;

    if (step2Node)
      step2Node.className =
        "w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center border-2 border-emerald-500 text-sm font-bold shadow";
    if (step2Icon) step2Icon.className = "fa-solid fa-check";
    if (step2SubText) step2SubText.textContent = "(Completed)";

    if (step3Node)
      step3Node.className =
        "w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center border-2 border-emerald-500 text-sm font-bold shadow";
    if (step3Icon) step3Icon.className = "fa-solid fa-check";
    if (step3Text)
      step3Text.className = "text-xs mt-2 font-bold text-emerald-600";
    if (step3SubText) step3SubText.textContent = "(Downloaded)";

    if (step4Node)
      step4Node.className =
        "w-10 h-10 bg-white text-orange-500 rounded-full flex items-center justify-center border-2 border-orange-500 text-sm font-bold shadow animate-pulse";
    if (step4Icon) step4Icon.className = "fa-solid fa-cloud-arrow-up";
    if (step4Text)
      step4Text.className = "text-xs mt-2 font-bold text-orange-600";
    if (step4SubText) step4SubText.textContent = "(Awaiting Drop)";
  } else if (dashboardState.paid && dashboardState.uploaded) {
    progress = 87;

    if (step2Node)
      step2Node.className =
        "w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center border-2 border-emerald-500 text-sm font-bold shadow";
    if (step2Icon) step2Icon.className = "fa-solid fa-check";
    if (step2SubText) step2SubText.textContent = "(Completed)";

    if (step3Node)
      step3Node.className =
        "w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center border-2 border-emerald-500 text-sm font-bold shadow";
    if (step3Icon) step3Icon.className = "fa-solid fa-check";
    if (step3Text)
      step3Text.className = "text-xs mt-2 font-bold text-emerald-600";
    if (step3SubText) step3SubText.textContent = "(Downloaded)";

    if (step4Node)
      step4Node.className =
        "w-10 h-10 bg-white text-blue-600 rounded-full flex items-center justify-center border-2 border-blue-500 text-sm font-bold shadow";
    if (step4Icon)
      step4Icon.className = "fa-solid fa-circle-notch animate-spin";
    if (step4Text) step4Text.className = "text-xs mt-2 font-bold text-blue-600";
    if (step4SubText) {
      step4SubText.className = "text-[10px] text-blue-500 font-semibold";
      step4SubText.textContent = "(Under Review)";
    }
  }

  if (progressBar) {
    progressBar.style.width = progress + "%";
  }
}
/*====================================================
    --- WORKSPACE COMPONENT TOGGLER ---
=======================================================*/
function updateWorkspaceUI() {
  toggleElementDisplay("badge-status-paid", dashboardState.paid);
  toggleElementDisplay("badge-status-unpaid", !dashboardState.paid);
  toggleElementDisplay("blueprint-btn-unlocked", dashboardState.paid);
  toggleElementDisplay("blueprint-btn-locked", !dashboardState.paid);
  toggleElementDisplay("dropzone-node-unlocked", dashboardState.paid);
  toggleElementDisplay("dropzone-node-locked", !dashboardState.paid);
  toggleElementDisplay("accounting-status-paid", dashboardState.paid);
  toggleElementDisplay("checkout-cta-btn", !dashboardState.paid);
}

function toggleElementDisplay(id, shouldShow) {
  const targetElement = document.getElementById(id);
  if (targetElement) {
    targetElement.classList.toggle("hidden", !shouldShow);
  }
}
/*====================================================
    --- CHECKOUT FLOW ENGINE ---
=======================================================*/
function triggerCheckoutPayment() {
  const paymentModal = document.getElementById("payment-modal");

  if (!paymentModal) {
    setUIState("paid");
    return;
  }

  paymentModal.classList.remove("hidden");

  setTimeout(() => {
    paymentModal.classList.add("hidden");
    setUIState("paid");
  }, 2500);
}
/*====================================================
    --- INTERACTION & SYSTEM EVENT BINDINGS ---
=======================================================*/

function bindStaticEventListeners() {
  document
    .getElementById("checkout-cta-btn")
    ?.addEventListener("click", triggerCheckoutPayment);

  document
    .getElementById("blueprint-btn-unlocked")
    ?.addEventListener("click", () => {
      if (!dashboardState.downloaded) {
        dashboardState.downloaded = true;
        updateDashboardProgress();
      }
    });

  const uploadBox = document.getElementById("dropzone-node-unlocked");
  const fileInput = document.getElementById("artwork-file-picker");

  if (uploadBox && fileInput) {
    uploadBox.addEventListener("click", () => fileInput.click());

    fileInput.addEventListener("change", (e) => {
      if (e.target.files && e.target.files.length > 0) {
        dashboardState.uploaded = true;

        if (!dashboardState.downloaded) {
          dashboardState.downloaded = true;
        }

        updateDashboardProgress();
        alert(
          `${e.target.files[0].name} uploaded successfully onto evaluation grid!`,
        );
      }
    });
  }
}

/*====================================================
    --- DOM CORE INITIALIZER ---
=======================================================*/
document.addEventListener("DOMContentLoaded", () => {
  const mobileMenuBtn = document.getElementById("mobile-menu-btn");
  const mobileDropdownMenu = document.getElementById("mobile-dropdown-menu");
  const menuIcon = document.getElementById("menu-icon");

  if (mobileMenuBtn && mobileDropdownMenu) {
    mobileMenuBtn.addEventListener("click", () => {
      mobileDropdownMenu.classList.toggle("hidden");
      if (menuIcon) {
        menuIcon.classList.toggle("fa-bars");
        menuIcon.classList.toggle("fa-xmark");
      }
    });
  }

  bindStaticEventListeners();
  setUIState("unpaid");
  
  document.getElementById("logout-btn")?.addEventListener("click", () => {
    if (typeof AuthEngine !== "undefined") {
      AuthEngine.logout();
    } else {
      localStorage.removeItem("isLoggedIn");
      localStorage.removeItem("userName");
    }
    alert("Logging out...");
    window.location.href = "index.html";
  });
});