function openNav() {
    document.getElementById("myNav").style.width = "100%";
    }

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
  }

function shortenNewsArticles() {
    let articles = document.querySelectorAll(".news-article a");
    articles.forEach(article => {
        if (window.innerWidth < 768) {
            article.textContent = article.textContent.split(" ").slice(0, 10).join(" ") + "...";
        }
    });
}

window.addEventListener("resize", shortenNewsArticles);
window.addEventListener("load", shortenNewsArticles);
