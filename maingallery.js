fetch("https://dog.ceo/api/breeds/image/random/10")
  .then((response) => response.json())
  .then((data) => data.message)
  .then((arrayOfLinks) => addPhoto(arrayOfLinks))
  .catch((e) => console.log(e));

function addPhoto(links) {
  let gallery= document.querySelector(".gallery");
  for (let link of links) {
    let image = document.createElement("img");
    image.src = link;
    gallery.appendChild(image);
  }
}
