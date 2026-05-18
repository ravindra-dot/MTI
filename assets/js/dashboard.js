/*  MyTalentIndia Dashboard State Engine */
function setUIState(state) {
    const viewEmpty = document.getElementById("view-state-empty");
    const viewWorkspace = document.getElementById("view-state-workspace");
    
    // dono views nahi mile to....
    if (!viewEmpty || !viewWorkspace) return;

    // Empty state show karo
    if (state === "empty") {
        viewEmpty.classList.remove("hidden");
        viewWorkspace.classList.add("hidden");
        return;
    }

    // main workspace show karo
    viewEmpty.classList.add("hidden");
    viewWorkspace.classList.remove("hidden");

    const isPaid = (state === "paid");

    // paid/unpaid ke hisab se elements show hide
    toggleElementDisplay("badge-status-paid", isPaid);
    toggleElementDisplay("badge-status-unpaid", !isPaid);
    toggleElementDisplay("blueprint-btn-unlocked", isPaid);
    toggleElementDisplay("blueprint-btn-locked", !isPaid);
    toggleElementDisplay("dropzone-node-unlocked", isPaid);
    toggleElementDisplay("dropzone-node-locked", !isPaid);
    toggleElementDisplay("accounting-status-paid", isPaid);
    toggleElementDisplay("checkout-cta-btn", !isPaid);

    // roadmap progress update
    updateRoadmapProgress(isPaid);
}

/* Roadmap progress aur steps update karne ke liye */
function updateRoadmapProgress(isPaid) {

    const progressBar = document.getElementById("roadmap-progress-bar");

    const step2Node = document.getElementById("roadmap-step-2-node");
    const step2Icon = document.getElementById("roadmap-step-2-icon");
    const step2Text = document.getElementById("roadmap-step-2-text");

    const step3Node = document.getElementById("roadmap-step-3-node");
    const step3Icon = document.getElementById("roadmap-step-3-icon");
    const step3Text = document.getElementById("roadmap-step-3-text");

    if (isPaid) {

        // paid hone ke baad progress increase
        if (progressBar) progressBar.style.width = "38%";

        // Step 2 complete state
        if (step2Node) step2Node.className = "w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm shadow-sm text-emerald-600 border-emerald-500 font-bold";

        if (step2Icon) step2Icon.className = "fa-solid fa-check";

        if (step2Text) step2Text.className = "text-xs mt-2 font-bold text-emerald-600";

        // Step 3 active state
        if (step3Node) step3Node.className = "w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm shadow-sm text-blue-600 border-blue-500 font-bold animate-pulse";

        if (step3Icon) step3Icon.className = "fa-solid fa-circle-dot";

        if (step3Text) step3Text.className = "text-xs mt-2 font-bold text-blue-600";

    } else {

        // unpaid state progress
        if (progressBar) progressBar.style.width = "12%";

        // Step 2 warning/active state
        if (step2Node) step2Node.className = "w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm shadow-sm text-amber-500 border-amber-400 font-bold animate-pulse";

        if (step2Icon) step2Icon.className = "fa-solid fa-circle-dot";

        if (step2Text) step2Text.className = "text-xs mt-2 font-bold text-amber-500";

        // Step 3 locked state
        if (step3Node) step3Node.className = "w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm text-gray-400 border-gray-200 shadow-sm";

        if (step3Icon) step3Icon.className = "fa-solid fa-circle";

        if (step3Text) step3Text.className = "text-xs mt-2 font-medium text-gray-400";
    }
}

/* Element ko show ya hide karne ke liye helper function */
function toggleElementDisplay(id, shouldShow) {

    const targetElement = document.getElementById(id);

    if (!targetElement) return;
    
    if (shouldShow) {
        targetElement.classList.remove("hidden");
    } else {
        targetElement.classList.add("hidden");
    }
}

/* Page load hote hi event listeners bind karo */
function bindStaticEventListeners() {

    document.getElementById("checkout-cta-btn")
        ?.addEventListener("click", triggerCheckoutPayment);
    
    document.getElementById("dropzone-node-unlocked")
        ?.addEventListener("click", () => {

        alert("File Uploaded Successfully! (This is a demo, no actual upload functionality implemented.)");
    });
}

function triggerCheckoutPayment() {
    const paymentModal = document.getElementById("payment-modal");
    // modal nahi mila to direct paid state
    if (!paymentModal) {
        console.warn("payment modal nahi mila");
        setUIState("paid");
        return;
    }

    // modal show karo
    paymentModal.classList.remove("hidden");
    
    // thodi der baad modal hide aur state update
    setTimeout(() => {
        paymentModal.classList.add("hidden");
        setUIState("paid");

    }, 2500);
}

// Dashboard start point
document.addEventListener("DOMContentLoaded", () => {

    bindStaticEventListeners();
    setUIState("unpaid"); // default state
});