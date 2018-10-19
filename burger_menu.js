var burger = $("#burger")
var dropDown = $("#drop_down")

burger.click(function () {
    dropDown.slideToggle(1000, function () {
        console.log("completed slide down")
    })
})

