const saveToLocalStorage = (key, data) => {
    if (data.length != 0) {
        localStorage.setItem(key, JSON.stringify(data));
    }
};

const createTable = (key) => {
    const data = JSON.parse(localStorage.getItem(key));
    const divToInsert = document.getElementById("Div");
    const h2 = document.createElement("h2");
    if (!data) {
        h2.innerText = "There is no data in LocalStorage";
        divToInsert.append(h2);
        return null;
    }
    h2.innerText = "Data from localstorage:";
    const table = document.createElement("table");
    table.border = "1";
    const thead = document.createElement("thead");
    const tbody = document.createElement("tbody");
    const headRow = document.createElement("tr");
    const headCell = document.createElement("th");

    return { tbody, table, divToInsert, data, h2, headCell, headRow, thead };
};

const showFromLocalStorage2 = (key) => {
    const doms = createTable(key);
    if (!doms) return;
    const { tbody, table, divToInsert, data, h2, headCell, headRow, thead } = doms;

    headCell.innerHTML = "Nurses";
    headRow.appendChild(headCell);
    thead.appendChild(headRow);

    data.forEach(function (nurse) {
        const row = document.createElement("tr");
        const cell = document.createElement("td");
        cell.textContent = nurse;
        row.appendChild(cell);
        tbody.appendChild(row);
    });
    table.appendChild(thead);
    table.appendChild(tbody);

    divToInsert.append(h2);
    divToInsert.append(table);
};

const showFromLocalStorage3 = (key) => {
    const doms = createTable(key);
    if (!doms) return;
    const { tbody, table, divToInsert, data, h2, thead } = doms;

    thead.innerHTML = "<th>Shift</th><th>Date</th><th>Nurses</th><th>Department</th><th>Ward Numbers</th>";

    data.forEach(function (nurse) {
        const row = document.createElement("tr");
        Object.values(nurse)
            .slice(1)
            .forEach(function (value) {
                const cell = document.createElement("td");
                cell.textContent = value;
                row.appendChild(cell);
            });
        tbody.appendChild(row);
    });
    table.appendChild(thead);
    table.appendChild(tbody);

    divToInsert.append(h2);
    divToInsert.append(table);
};

const showFromLocalStorage1 = (key) => {
    const doms = createTable(key);
    if (!doms) return;
    const { tbody, table, divToInsert, data, h2, headCell, headRow, thead } = doms;

    headCell.innerHTML = "Ward";
    headRow.appendChild(headCell);
    thead.appendChild(headRow);

    data.forEach(function (ward) {
        const row = document.createElement("tr");
        const cell = document.createElement("td");
        cell.textContent = ward;
        row.appendChild(cell);
        tbody.appendChild(row);
    });
    table.appendChild(thead);
    table.appendChild(tbody);

    divToInsert.append(h2);
    divToInsert.append(table);
};
