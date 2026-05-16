/**
 * MyTalentIndia Dashboard State Engine
 * Manages the layout views depending on user payment status and registration logs.
 */

function setUIState(state) {
    const container = document.getElementById("dynamic-workspace-target");
    if (!container) return;
    
    // Clear the current workspace DOM tree completely
    container.innerHTML = "";

    // View State A: No active entry records found
    if (state === "empty") {
        container.innerHTML = `
            <div class="bg-white p-12 text-center rounded-2xl shadow-sm border max-w-md mx-auto space-y-4 my-12">
                <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto text-2xl">
                    <i class="fa-regular fa-folder-open"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-800">No Active Contests Enrolled</h3>
                    <p class="text-sm text-gray-500 mt-1">You have not committed enrollment spaces inside active art tracks yet.</p>
                </div>
                <a href="index.html#categories" class="bg-orange-500 text-white font-bold px-6 py-2 rounded-full text-sm inline-block shadow hover:bg-orange-600 transition">
                    Browse Contests Catalog
                </a>
            </div>`;
        return;
    }

    // Dynamic configuration variables based on payment validation state
    const isPaid = state === "paid";

    // View State B & C: Render the detailed tracking layout workspace
    container.innerHTML = `
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <div class="lg:col-span-8 bg-white rounded-2xl shadow-sm border p-6 space-y-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b pb-4 gap-4">
                    <div>
                        <span class="bg-blue-100 text-blue-800 font-bold uppercase tracking-wider text-[10px] px-2.5 py-1 rounded">
                            Registered Contest Track
                        </span>
                        <h2 class="text-xl font-bold text-gray-800 mt-1">All India & Global Painting Competition 2026</h2>
                    </div>
                    <div class="flex items-center gap-2">
                        ${isPaid 
                            ? `<span class="bg-emerald-100 text-emerald-700 font-bold text-xs px-3 py-1 rounded-full border border-emerald-200"><i class="fa-solid fa-check-double mr-1"></i> Paid & Verified</span>`
                            : `<span class="bg-red-100 text-red-700 font-bold text-xs px-3 py-1 rounded-full border border-red-200 animate-pulse"><i class="fa-solid fa-hourglass-start mr-1"></i> Fees Pending</span>`
                        }
                        <span class="bg-amber-100 text-amber-800 font-bold text-xs px-3 py-1 rounded-full border border-amber-200">
                            <i class="fa-regular fa-clock mr-1"></i> Deadline Alert: 76 Days Remaining
                        </span>
                    </div>
                </div>

                <div class="block py-4 overflow-x-auto">
                    <div class="relative min-w-[600px] px-4">
                        <div class="absolute top-5 left-8 right-8 h-1 bg-gray-200 z-0"></div>
                        <div class="absolute top-5 left-8 h-1 bg-gradient-to-r from-emerald-500 to-blue-500 z-0 transition-all duration-500" style="width: ${isPaid ? "50%" : "25%"};"></div>
                        
                        <div class="relative z-10 flex justify-between text-center">
                            <div class="flex flex-col items-center w-24">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm text-emerald-600 border-emerald-500 font-bold shadow-sm">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <span class="text-xs mt-2 font-bold text-emerald-600">Step 1: Registered</span>
                            </div>
                            <div class="flex flex-col items-center w-24">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm shadow-sm ${isPaid ? "text-emerald-600 border-emerald-500 font-bold" : "text-amber-500 border-amber-400 font-bold animate-pulse"}">
                                    <i class="fa-solid ${isPaid ? "fa-check" : "fa-circle-dot"}"></i>
                                </div>
                                <span class="text-xs mt-2 font-bold ${isPaid ? "text-emerald-600" : "text-amber-500"}">Step 2: Fees Paid</span>
                            </div>
                            <div class="flex flex-col items-center w-24">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm text-gray-400 border-gray-200 shadow-sm ${isPaid ? "text-blue-600 border-blue-500 font-bold" : ""}">
                                    <i class="fa-solid fa-circle"></i>
                                </div>
                                <span class="text-xs mt-2 font-medium ${isPaid ? "text-blue-600" : ""}">Step 3: Artwork Sheet</span>
                            </div>
                            <div class="flex flex-col items-center w-24">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center border-2 text-sm text-gray-400 border-gray-200 shadow-sm">
                                    <i class="fa-solid fa-circle"></i>
                                </div>
                                <span class="text-xs mt-2 font-medium text-gray-400">Step 4: Uploaded</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t pt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-5 bg-slate-50 rounded-xl border border-gray-200 space-y-3">
                        <h4 class="font-bold text-gray-800">Contest Blueprint Sheet Layout</h4>
                        <p class="text-xs text-gray-500">Official printable design framework papers configurations profiles layers assets mapping.</p>
                        ${isPaid 
                            ? `<a href="#" class="w-full bg-blue-900 text-white font-bold py-2 rounded text-xs uppercase tracking-wider text-center block shadow hover:bg-blue-800 transition"><i class="fa-solid fa-download mr-1"></i> Download Design Sheet Layout</a>`
                            : `<button disabled class="w-full bg-gray-200 text-gray-400 font-bold py-2 rounded text-xs uppercase cursor-not-allowed flex items-center justify-center gap-2"><i class="fa-solid fa-lock"></i> Locked Pending Payment Checks</button>`
                        }
                    </div>

                    <div class="p-5 bg-slate-50 rounded-xl border border-gray-200 space-y-3">
                        <h4 class="font-bold text-gray-800">Finished Artwork Submission Drop</h4>
                        <p class="text-xs text-gray-500">Sync completed work assets tracking configurations nodes pipelines directly to server repositories.</p>
                        ${isPaid 
                            ? `<div onclick="alert('File synced to evaluation cloud node registers successfully!')" class="border-2 border-dashed border-blue-300 hover:border-blue-500 transition bg-white text-center py-4 rounded cursor-pointer space-y-1">
                                    <i class="fa-solid fa-cloud-arrow-up text-blue-500 text-lg"></i>
                                    <span class="text-xs font-bold text-gray-700 block">Drag & Drop Finished Scan File Here</span>
                               </div>`
                            : `<div class="border border-dashed bg-gray-100 text-center py-4 rounded text-xs text-gray-400 font-bold uppercase"><i class="fa-solid fa-ban mr-1"></i> Upload Workspace Inactive</div>`
                        }
                    </div>
                </div>
            </div>

            <div class="lg:col-span-4 bg-white p-6 rounded-2xl shadow-sm border border-gray-200 space-y-4">
                <h3 class="font-black text-gray-800 text-sm uppercase tracking-wider border-b pb-2">Financial Accounting Nodes</h3>
                <div class="flex justify-between items-center text-sm font-medium">
                    <span class="text-gray-500">Registration Audit:</span>
                    <span class="font-mono font-bold text-gray-700">₹299.00 INR</span>
                </div>
                ${isPaid 
                    ? `<div class="bg-emerald-50 text-emerald-800 p-3 rounded-xl border border-emerald-200 text-xs text-center font-bold flex items-center justify-center gap-2"><i class="fa-solid fa-circle-check"></i> Allocation Fee Cleared & Settled</div>`
                    : `<button onclick="triggerCheckoutPayment()" class="w-full bg-orange-500 text-white font-bold py-3 rounded-xl text-xs uppercase tracking-widest shadow-md hover:bg-orange-600 transition block text-center"><i class="fa-solid fa-credit-card mr-1"></i> Pay Fee and Unlock Assets</button>`
                }
            </div>

        </div>`;
}

/**
 * Simulates a standard 2.5-second redirect sequence for payment processing validation.
 */
function triggerCheckoutPayment() {
    const paymentModal = document.getElementById("payment-modal");
    if (!paymentModal) return;

    paymentModal.classList.remove("hidden");
    
    setTimeout(() => {
        paymentModal.classList.add("hidden");
        setUIState("paid");
    }, 2500);
}

// Fire an initial state load setup. Set parameter defaults to "paid" or "unpaid" as desired.
document.addEventListener("DOMContentLoaded", () => {
    setUIState("paid");
});