function create(tag, container, text=null) {
    const element = document.createElement(tag)
    if (text)
        element.innerText = text
    container.appendChild(element)
    return element
}

const divRestaurant = document.querySelector("#restaurant");


function afficher_matrice() {
    let divMatrice = create("div", divRestaurant)
    divMatrice.id = 'matrice'

    let matTable = create("table", divMatrice)
    matTable.id = 'mat_table'

    for (let i = 0; i < 12; i++) {

        let tr = create("tr", matTable)
        tr.id = i.toString()

        for (let y = 0; y < 12; y++) {
            let td = create("td", tr)
            td.id = i.toString() + y.toString()
            td.classList.add("vide")
        }
    }

}

afficher_matrice()