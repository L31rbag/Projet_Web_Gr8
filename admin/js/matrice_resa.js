function create(tag, container, text=null) {
    const element = document.createElement(tag)
    if (text)
        element.innerText = text
    container.appendChild(element)
    return element
}

const divRestaurant = document.querySelector("#restaurant")

let mat = range(data_reservation)


function afficher_matrice() {
    let divMatrice = create("div", divRestaurant)
    divMatrice.id = 'matrice'

    let matTable = create("table", divMatrice)
    matTable.id = 'mat_table'

    for (let i = 0; i < 12; i++) {

        let tr = create("tr", matTable)
        tr.id = i.toString()

        for (let y = 0; y < 12; y++) {
            let td = create("td", tr, mat[i][y])
            td.id = i.toString() + y.toString()

            if (mat[i][y] == "x") {
                td.classList.add("chaise");

            } else if (mat[i][y] == ".") {
                td.classList.add("vide");

            } else {
                td.classList.add("table")
            }

        }
    }

}

afficher_matrice()