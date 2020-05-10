function suggestions(str) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }

    if (str.length == 0) {
        document.getElementById("showSuggestion").innerHTML = ""
        return
    } else {
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("showSuggestion").innerHTML = this.responseText
            }
        }
        var select = document.getElementById("select").value
        var url = "searchInfo.php?searchBy=" + select + "&value=" + str
        xmlhttp.open("GET", url, true)
        xmlhttp.send()
    }
}