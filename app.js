// app.js
console.log("JS file is connected")
function showSidebar() {
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
  }
  
function hideSidebar() {
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
  }

function openPage() {
    window.location.href = "contact.html";
  }

function newPage() {
    window.location.href = "innovating-smart.html";
  }

function anotherPage() {
    window.location.href ="service-offering.html";
  }

function showMessage() {
    alert('Button Clicked')
  }

function aboutPage() {
    window.location.href ="about.html"
  }

function searchWebsite() {
    let searchTerm = document.getElementById("searchInput").value.toLowerCase();

    if (searchTerm.includes("home")) {
        window.location.href = "default.html";
    }
    else if (searchTerm.includes("about")) {
        window.location.href = "about.html";
    }
    else if (searchTerm.includes("service")) {
        window.location.href = "services.html";
    }
    else if (searchTerm.includes("contact")) {
        window.location.href = "contact.html";
    }
    else if (searchTerm.includes("service-offering")) {
      window.location.href = "service-offering.html"
    }
    else {
        alert("No matching page found.");
    }
}

