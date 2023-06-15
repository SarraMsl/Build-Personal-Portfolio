function createPaginationButtons() {
  var table = document.getElementById("dataTable");
  var rows = table.getElementsByTagName("tr");
  var numRows = rows.length - 1; // Exclude the table header row

  var pagination = document.getElementById("pagination");
  pagination.innerHTML = ""; // Clear existing buttons

  var numButtons = Math.ceil(numRows / 10); // Calculate the number of buttons needed

  for (var i = 0; i < numButtons; i++) {
    var startIdx = i * 10 + 1;
    var endIdx = Math.min(startIdx + 9, numRows);
    var buttonText = i + 1; // Set button text as the number of the button

    var button = document.createElement("li");
    button.classList.add("page-item");
    button.innerHTML = '<a class="page-link" href="#" onclick="displayRows(' + (startIdx - 1) + ')">' + buttonText + '</a>';

    pagination.appendChild(button);
  }
}

function displayRows(startIndex) {
  var table = document.getElementById("dataTable");
  var rows = table.getElementsByTagName("tr");

  // Hide all rows
  for (var i = 1; i < rows.length; i++) {
    rows[i].style.display = "none";
  }

  // Show the specified range of rows
  for (var j = startIndex; j < startIndex + 10; j++) {
    if (j < rows.length) {
      rows[j].style.display = "";
    }
  }
}

// Create pagination buttons initially
createPaginationButtons();




const searchInput = document.getElementById('searchInput');
const dataTable = document.getElementById('dataTable');

searchInput.addEventListener('keyup', function() {
    const searchTerm = searchInput.value.toLowerCase();

    for (let i = 1; i < dataTable.rows.length; i++) {
        const row = dataTable.rows[i];
        let found = false;

        for (let j = 0; j < row.cells.length; j++) {
            const cell = row.cells[j];
            const cellText = cell.innerHTML.toLowerCase();

            if (cellText.includes(searchTerm)) {
                found = true;
                break;
            }
        }

        if (found) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    }
}); function changeVisibleRowCount(value) {
var rowCount = parseInt(value);
var table = document.getElementById("dataTable");

for (var i = 1; i < table.rows.length; i++) {
var row = table.rows[i];

if (i <= rowCount) {
  row.style.display = "";
} else {
  row.style.display = "none";
}
}
}



