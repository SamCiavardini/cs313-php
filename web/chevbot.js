function increment(id){
	var like = document.getElementById("l" + id);
	var num = like.innerHTML;
	num++;
	like.innerHTML = num;


	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            like.innerHTML = num;
        }
    };
    xmlhttp.open("GET", "increment.php?postId=" + id + "&likes=" + num, true);
    xmlhttp.send();
}

function setvisible(){
    var commentInput = document.getElementById("commentInput");
    var typeComment  = document.getElementById("typeComment");
    commentInput.style.display = "inline";
    typeComment.style.display = "none";
}

function decrement(id){
    var dislike = document.getElementById("d" + id);
    var num = dislike.innerHTML;
    num++;
    dislike.innerHTML = num;


    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dislike.innerHTML = num;
        }
    };
    xmlhttp.open("GET", "decrement.php?postId=" + id + "&dislikes=" + num, true);
    xmlhttp.send();
}