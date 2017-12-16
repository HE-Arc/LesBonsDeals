var displayedAsList;


function showAsList() {
    console.log('ShowAsList');
    //Set Cookie to know the last "preference"
    document.cookie = "display_mode=list";

    //Check if it's already a list
    if (displayedAsList === true)
        return;

    //Get all articles
    var articles = document.getElementsByClassName("article");

    //Check if there is articles
    var listToDisplay = document.getElementById('show-list');
    if (articles.length === 0) {
        showNoResult(listToDisplay);
        return;
    }

    var article;
    var allArticles = [];
    var articlesLinks = [];

    //Create a row with each article
    for (index = 0; index < articles.length; ++index) {
        article = articles[index];
        var image = article.getElementsByClassName('image-article')[0];
        var title = article.getElementsByClassName('article-name')[0].innerText;
        var description = article.getElementsByClassName('description')[0].innerText ;
        var price =  article.getElementsByClassName('article-price')[0].innerText ;
        articlesLinks[index] = article.getElementsByClassName('article-link')[0];

        //Create a row
        var row = document.createElement("DIV");
        row.className = "row mb-4 bg-white article";

        //Create col image
        var colImg = document.createElement("DIV");
        var colTitle = document.createElement("DIV");
        var colPrice = document.createElement("DIV");

        colImg.className += 'col-sm-2 pl-0';
        colTitle.className += 'col-sm-8';
        colPrice.className += 'col-sm-2 article-price';

        //Set content of the cols
        colImg.appendChild(image);
        colTitle.innerHTML = '<p class="article-name">' + title + '<hr></p> <p class="description">' + description + '</p>';
        colPrice.innerHTML = '<b>' +price + '</b><hr>';

        row.appendChild(colImg);
        row.appendChild(colTitle);
        row.appendChild(colPrice);

        allArticles[index] = row;
    }

    //Delete old view
    listToDisplay.innerText = "";

    // show articles
    var counter = 0;
    allArticles.forEach(function (article) {
        articlesLinks[counter].innerHTML = "";
        articlesLinks[counter].appendChild(article);
        listToDisplay.appendChild(articlesLinks[counter]);
        counter++;
    });

    displayedAsList = true;
}

function showAsCard() {

    //Set Cookie to know the last "preference"
    document.cookie = "display_mode=grid";

    //Return if already displayed as grid
    if (displayedAsList === false) {
        return;
    }

    //Get all articles
    var articles = document.getElementsByClassName("article");

    //Check if there is articles
    var listToDisplay = document.getElementById('show-list');
    if (articles.length === 0) {
        showNoResult(listToDisplay);
        return;
    }

    //Get the content to display as grid
    var article;
    var allImages = [];
    var articlesLinks = [];
    var cardsFromInside0= [];
    var cardsFromInside1= [];
    var cardsFromInside2= [];

    //Create a row with each article
    for (var index = 0; index < articles.length; ++index) {
        article = articles[index];
        allImages[index] = article.getElementsByClassName('image-article')[0];
        articlesLinks[index] = document.getElementsByClassName('article-link')[index];

        var title = article.getElementsByClassName('article-name')[0].innerText;
        var description = article.getElementsByClassName('description')[0].innerText;
        var price = article.getElementsByClassName('article-price')[0].innerText;

        var cardFromInside0= document.createElement("DIV");
        cardFromInside0.className = "card-body";
        cardFromInside0.innerHTML = '<h5 class="card-title article-name">'+ title + '</h5>' +
            '<h6 class="description" hidden="hidden">' + description + '</h6>' +
            '<p class="card-text article-price">'+price+'</p>';
        cardsFromInside0[index] = cardFromInside0;

        var cardFromInside1 = document.createElement("DIV");
        cardFromInside1.className = "card text-center bg-light";
        cardsFromInside1[index] = cardFromInside1;

        var cardFromInside2 = document.createElement("DIV");
        cardFromInside2.className="card mx-2 item";
        cardFromInside2.setAttribute('style','width: 14rem');
        cardsFromInside2[index] = cardFromInside2;
    }

    //Assembly all cards
    var row = document.createElement("DIV");
    row.className = "row";

    var counter = 0;
    articlesLinks.forEach(function (link) {
        articlesLinks[counter].innerHTML = "";
        var articleDiv = document.createElement("DIV");
        articleDiv.className = "article";
        cardsFromInside1[counter].appendChild(cardsFromInside0[counter]);
        cardsFromInside2[counter].appendChild(allImages[counter]);
        cardsFromInside2[counter].appendChild(cardsFromInside1[counter]);
        articlesLinks[counter].appendChild(cardsFromInside2[counter]);
        articleDiv.appendChild(articlesLinks[counter]);
        row.appendChild(articleDiv);
        counter++;
    });


    listToDisplay.innerText = "";
    listToDisplay.appendChild(row);
    displayedAsList = false;
}


function showNoResult(listToDisplay){
    listToDisplay.getElementsByClassName('row')[0].innerHTML = '<p><i>Aucun résultats</i></p>';
}