/* =========================================================
   DASHBOARD ENGINE STATE CONTROLLER
  ========================================================= */
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

  const isPaid = state === "paid";

  toggleElementDisplay("badge-status-paid", isPaid);
  toggleElementDisplay("badge-status-unpaid", !isPaid);
  toggleElementDisplay("blueprint-btn-unlocked", isPaid);
  toggleElementDisplay("blueprint-btn-locked", !isPaid);
  toggleElementDisplay("dropzone-node-unlocked", isPaid);
  toggleElementDisplay("dropzone-node-locked", !isPaid);
  toggleElementDisplay("accounting-status-paid", isPaid);
  toggleElementDisplay("checkout-cta-btn", !isPaid);

  updateRoadmapProgress(isPaid);
}

/* =========================================================
                  PROGRESS BAR UPDATE FUNCTION
   ========================================================= */
function updateRoadmapProgress(isPaid) {
  const progressBar = document.getElementById("roadmap-progress-bar");

  const step2Node = document.getElementById("roadmap-step-2-node");
  const step2Icon = document.getElementById("roadmap-step-2-icon");
  const step2Text = document.getElementById("roadmap-step-2-text");

  const step3Node = document.getElementById("roadmap-step-3-node");
  const step3Icon = document.getElementById("roadmap-step-3-icon");
  const step3Text = document.getElementById("roadmap-step-3-text");

  if (isPaid) {
    if (progressBar) progressBar.style.width = "38%";

    if (step2Node) step2Node.className = "w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm shadow-sm text-emerald-600 border-emerald-500 font-bold";
    if (step2Icon) step2Icon.className = "fa-solid fa-check";
    if (step2Text) step2Text.className = "text-xs mt-2 font-bold text-emerald-600";

    if (step3Node) step3Node.className = "w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm shadow-sm text-blue-600 border-blue-500 font-bold animate-pulse";
    if (step3Icon) step3Icon.className = "fa-solid fa-circle-dot";
    if (step3Text) step3Text.className = "text-xs mt-2 font-bold text-blue-600";
  } else {
    if (progressBar) progressBar.style.width = "12%";

    if (step2Node) step2Node.className = "w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm shadow-sm text-amber-500 border-amber-400 font-bold animate-pulse";
    if (step2Icon) step2Icon.className = "fa-solid fa-circle-dot";
    if (step2Text) step2Text.className = "text-xs mt-2 font-bold text-amber-500";

    if (step3Node) step3Node.className = "w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm text-gray-400 border-gray-200 shadow-sm";
    if (step3Icon) step3Icon.className = "fa-solid fa-circle";
    if (step3Text) step3Text.className = "text-xs mt-2 font-medium text-gray-400";
  }
}

function toggleElementDisplay(id, shouldShow) {
  const targetElement = document.getElementById(id);
  if (!targetElement) return;

  if (shouldShow) {
    targetElement.classList.remove("hidden");
  } else {
    targetElement.classList.add("hidden");
  }
}

/* =========================================================
   3. INTERACTION & MOCK PAYMENT
   ========================================================= */
function triggerCheckoutPayment() {
  const paymentModal = document.getElementById("payment-modal");
  
  if (!paymentModal) {
    console.warn("Payment modal not found");
    setUIState("paid");
    return;
  }

  paymentModal.classList.remove("hidden");

  setTimeout(() => {
    paymentModal.classList.add("hidden");
    setUIState("paid");
  }, 2500);
}

function bindStaticEventListeners() {
  document.getElementById("checkout-cta-btn")?.addEventListener("click", triggerCheckoutPayment);

  document.getElementById("dropzone-node-unlocked")?.addEventListener("click", () => {
    alert("File Uploaded Successfully!");
  });
}

/* =========================================================
   SYSTEM LIFECYCLE INITIALIZER
   ========================================================= */
document.addEventListener("DOMContentLoaded", () => {
  if (typeof AuthEngine !== "undefined" && !AuthEngine.isLoggedIn()) {
    alert("Please log in to access the dashboard.");
    window.location.href = "auth.html";
    return;
  }

  const user = typeof AuthEngine !== "undefined" ? AuthEngine.getCurrentUser() : null;

  if (user) {
    const nameEl = document.getElementById("db-user-name");
    const emailEl = document.getElementById("db-user-email");
    if (nameEl) nameEl.textContent = user.name;
    if (emailEl) emailEl.textContent = user.email;
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