document.addEventListener('DOMContentLoaded', function() {
    const editCategoryButton = document.getElementById('editCategoryButton');
    const newCategoryNameField = document.getElementById('editCategoryForm');
    const saveButton = newCategoryNameField.querySelector('button[name="action"][value="save"]');
    const cancelButton = document.getElementById('cancelEditButton');
    const addCategoryButton = document.querySelector('button[name="action"][value="add"]');
    const deleteCategoryButton = document.querySelector('button[name="action"][value="delete"]');

    editCategoryButton.addEventListener('click', function() {
        newCategoryNameField.style.display = 'block';
        saveButton.style.display = 'inline-block';
        cancelButton.style.display = 'inline-block';
        addCategoryButton.style.display = 'none';
        deleteCategoryButton.style.display = 'none';
        editCategoryButton.style.display = 'none';
    });

    cancelButton.addEventListener('click', function() {
        newCategoryNameField.style.display = 'none';
        saveButton.style.display = 'none';
        cancelButton.style.display = 'none';
        addCategoryButton.style.display = 'inline-block';
        deleteCategoryButton.style.display = 'inline-block';
        editCategoryButton.style.display = 'inline-block';
    });
});