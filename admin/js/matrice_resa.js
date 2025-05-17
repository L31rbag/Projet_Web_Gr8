function create(tag, container, text=null) {
    const element = document.createElement(tag)
    if (text)
        element.innerText = text
    container.appendChild(element)
    return element
}

const divRestaurant = document.querySelector("#restaurant")

function afficher_plan(mat) {
    let divMatrice = create("div", divRestaurant)
    divMatrice.id = 'matrice'

    let matTable = create("table", divMatrice)
    matTable.id = 'mat_table'

    for (let i = 0; i < 20; i++) {

        let tr = create("tr", matTable)
        tr.id = i.toString()

        for (let y = 0; y < 20; y++) {
            let td = create("td", tr, mat[i][y])
            td.id = i.toString() + "," + y.toString()

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

afficher_plan(plan)