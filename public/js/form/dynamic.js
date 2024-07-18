$(document).ready(function () {
    console.log("adasdasd");
    $("#add-field").click(function () {
        let fieldIndex = $("#fields .field-group").length;
        let fieldHtml = `
            <div class="form-group field-group">
                <label>Field Label</label>
                <input type="text" name="fields[${fieldIndex}][label]" class="form-control" required>

                <label>Field Type</label>
                <select name="fields[${fieldIndex}][type]" class="form-control field-type" required>
                    <option value="text">Text</option>
                    <option value="number">Number</option>
                    <option value="email">Email</option>
                    <option value="textarea">Textarea</option>
                    <option value="select">Select</option>
                </select>

                <div class="options-container" style="display:none;">
                    <label>Options</label>
                    <div class="options">
                        <!-- Options will be added here -->
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm add-option">Add Option</button>
                </div>

                <button type="button" class="btn btn-danger btn-sm remove-field">Remove</button>
            </div>
        `;
        $("#fields").append(fieldHtml);
    });

    $(document).on("change", ".field-type", function () {
        if ($(this).val() === "select") {
            $(this).siblings(".options-container").show();
        } else {
            $(this).siblings(".options-container").hide();
        }
    });

    $(document).on("click", ".add-option", function () {
        let fieldIndex = $(this).closest(".field-group").index();
        let optionIndex = $(this).siblings(".options").children().length;
        let optionHtml = `
            <div class="form-group option-group">
                <input type="text" name="fields[${fieldIndex}][options][${optionIndex}]" class="form-control" placeholder="Option value" required>
                <button type="button" class="btn btn-danger btn-sm remove-option">Remove Option</button>
            </div>
        `;
        $(this).siblings(".options").append(optionHtml);
    });

    $(document).on("click", ".remove-option", function () {
        $(this).closest(".option-group").remove();
    });

    $(document).on("click", ".remove-field", function () {
        $(this).closest(".field-group").remove();
    });
});
