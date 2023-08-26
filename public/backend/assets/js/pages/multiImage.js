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

    // Function to filter the table rows based on the entered search query
    function filterTable() {
      var input, filter, table, rows, i, td, txtValue, found;
      input = document.getElementById("searchInput");
      filter = input.value.trim().toLowerCase(); // Remove leading and trailing whitespace, and convert to lowercase
      table = document.getElementById("dataTable");
      rows = table.getElementsByTagName("tr");
      found = false;

      // Loop through all table rows and hide those that don't match the search query
      for (i = 0; i < rows.length; i++) {
          td = rows[i].getElementsByTagName("td")[0]; // Assuming the ID column is the first column (index 0)

          if (td) {
              txtValue = td.textContent || td.innerText;
              txtValue = txtValue.trim().toLowerCase(); // Convert the table cell value to lowercase

              if (filter === "" || txtValue === filter) { // Added condition to check if the filter value is empty
                  rows[i].style.display = "";
                  found = true;
              } else {
                  rows[i].style.display = "none";
              }
          }
      }

      // Hide the table if no matching result is found
      if (!found) {
          table.style.display = "none";
      } else {
          table.style.display = "";
      }
  }

  // Attach an event listener to the search input field
  document.getElementById("searchInput").addEventListener("keyup", filterTable);


