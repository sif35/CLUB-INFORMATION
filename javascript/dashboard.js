const dashboardEvent = document.getElementById("event-dashboard")
const dashboardIntel = document.getElementById("intel-dashboard")
const dashboardMember = document.getElementById("member-dashboard")
const dashboardAdmin = document.getElementById("admin-dashboard")

const eventsBox = document.getElementById("events")
const intelsBox = document.getElementById("intels")
const membersBox = document.getElementById("members")
const adminBox = document.getElementById("admins")

eventsBox.style.display = ""
intelsBox.style.display = "none"
membersBox.style.display = "none"
adminBox.style.display = "none"



dashboardEvent.addEventListener("click", function (event) {
    dashboardEvent.classList.add("dashboard__active")
    dashboardIntel.classList.remove("dashboard__active")
    dashboardMember.classList.remove("dashboard__active")
    dashboardAdmin.classList.remove("dashboard__active")

    eventsBox.style.display = ""
    intelsBox.style.display = "none"
    membersBox.style.display = "none"
    adminBox.style.display = "none"
})

dashboardIntel.addEventListener("click", function (event) {
    dashboardIntel.classList.add("dashboard__active")
    dashboardEvent.classList.remove("dashboard__active")
    dashboardAdmin.classList.remove("dashboard__active")
    dashboardMember.classList.remove("dashboard__active")

    intelsBox.style.display = ""
    eventsBox.style.display = "none"
    membersBox.style.display = "none"
    adminBox.style.display = "none"
})

dashboardMember.addEventListener("click", function (event) {
    dashboardMember.classList.add("dashboard__active")
    dashboardEvent.classList.remove("dashboard__active")
    dashboardIntel.classList.remove("dashboard__active")
    dashboardAdmin.classList.remove("dashboard__active")

    membersBox.style.display = ""
    intelsBox.style.display = "none"
    eventsBox.style.display = "none"
    adminBox.style.display = "none"
})

dashboardAdmin.addEventListener("click", function (event) {
    dashboardAdmin.classList.add("dashboard__active")
    dashboardEvent.classList.remove("dashboard__active")
    dashboardIntel.classList.remove("dashboard__active")
    dashboardMember.classList.remove("dashboard__active")

    adminBox.style.display = ""
    intelsBox.style.display = "none"
    eventsBox.style.display = "none"
    membersBox.style.display = "none"
})
