fetch("http://cookbook.local/recipe/getComments" + window.location.search)
    .then(response => response.json())
    .then(data => showComments(JSON.stringify(data)));

function showComments(data)
{
    data = JSON.parse(data);
    let comment = document.getElementById("comment");
    comment.innerHTML = '';
    let style;
    for (let i = 1; i <= data.length; i++) {
        if (i % 2 === 0) {
            style = "dark";
        } else {
            style = "primary";
        }
        let html = '<div class="col-3 col-sm-5 col-md-20 col-lg-10" >\n' +
            '        <div class="alert alert-' + style + '">\n' +
            '            <h5 id="name">' + data[i - 1].username + '</h5>\n' +
            '            <p id="text">' + data[i - 1].text + '</p>\n' +
            '        </div>\n' +
            '    </div>';
        comment.innerHTML += html;
    }
}

let commentsForm = document.getElementById("commentsForm");
commentsForm.addEventListener("submit", function (e) {
    e.preventDefault();
    let name = document.getElementById("username").value;
    let text = document.getElementById("commentText").value;
    let formData = {
        "username" : name,
        "text" : text
    };
    let url = "http://cookbook.local/recipe/createComment" + window.location.search
    fetch(url , {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData)
        })
            .then(response => console.log(JSON.stringify(formData) + url))
            .then(commentsForm.reset())
            .catch(error => alert(error))
    fetch("http://cookbook.local/recipe/getComments" + window.location.search)
        .then(response => response.json())
        .then(data => showComments(JSON.stringify(data)));
})

let like = document.getElementById("likeImg");
let defaultLike =  "http://cookbook.local/img/heart_default.png";
let activeLike = "http://cookbook.local/img/heart_active.png";

function putLike(button, style)
{
    let url = "http://cookbook.local/wishlist/addRecipe" + window.location.search
    fetch(url , {
        method: 'GET'
    })
        .then(button.src = style)
        .then(button.title = "Додати до обраного")
        .catch(error => alert(error))
}

function removeLike(button, style)
{
    let url = "http://cookbook.local/wishlist/removeRecipe" + window.location.search
    fetch(url , {
        method: 'GET'
    })
        .then(button.src = style)
        .then(button.title = "Додати до обраного")
        .catch(error => alert(error))
}

function sendQuery()
{
    fetch("http://cookbook.local/wishlist/getLikes" + window.location.search)
        .then(response => response.json())
        .then(data => getLikesCount(data))
}

function getLikesCount(data)
{
    let likesCount = document.getElementById("likes_count");
    let html = "<b>" + data + "</b> вподобань";
    likesCount.innerHTML = html;
}

window.onload = sendQuery();
like.addEventListener("click", function () {
    if (like.src === defaultLike) {
        putLike(like, activeLike);
    } else {
        removeLike(like, defaultLike);
    }
    sendQuery();
})
