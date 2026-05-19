// --- GLOBAL MOCK DATABASE & AUTH CONFIG ---

// 1. Demo User Data (Jo poori site me same rahega)
const DEMO_USER = {
    id: "MTI123456",
    name: "Ravindra Singh",
    email: "ravindra@ex.com",
    avatar: "assets/images/logo-icon.png",
    age: 19,
    category: "Senior (17+ Years)",
    submissionStatus: "Pending"
};

const AuthEngine = {
    isLoggedIn: function() {
        return localStorage.getItem("mti_logged_in") === "true";
    },

    // Logged in user ka data get karne ke liye
    getCurrentUser: function() {
        if (!this.isLoggedIn()) return null;
        const storedUser = localStorage.getItem("mti_user_data");
        return storedUser ? JSON.parse(storedUser) : DEMO_USER;
    },

    // Login function
    login: function() {
        localStorage.setItem("mti_logged_in", "true");
        localStorage.setItem("mti_user_data", JSON.stringify(DEMO_USER));
    },

    // Logout function
    logout: function() {
        localStorage.removeItem("mti_logged_in");
        localStorage.removeItem("mti_user_data");
        window.location.href = "index.html"; 
    }
};
// usernamr update function
uname = document.querySelectorAll(".u-name");
uid = document.querySelectorAll(".uid");
if (uname) {
    const currentUser = AuthEngine.getCurrentUser();
    uname.forEach(element => {
        element.textContent = currentUser.name;
    });
}
if (uid) {
    const currentUser = AuthEngine.getCurrentUser();
    uid.forEach(element => {
        element.textContent = currentUser.id;
    });
}

