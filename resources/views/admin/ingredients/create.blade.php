@extends('layouts.admin')
@section('title', 'Ingredients List')
@section('content')

<div class="uk-container uk-margin-large-top">
    <h1>Add Ingredients</h1>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="uk-alert-danger" uk-alert>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.ingredients.store') }}">
        @csrf

        <!-- Dish Name -->
        <div class="uk-margin">
            <label for="dishName" class="uk-form-label">Dish Name</label>
            <input type="text" name="dish_name" id="dishName" class="uk-input" placeholder="e.g., Chicken Biryani"
                required>
        </div>

        <!-- Ingredients Section -->
        <div id="ingredientsContainer" class="uk-margin">
            <h4>Ingredients</h4>
            <div class="ingredient-row uk-card uk-card-default uk-card-body uk-margin-medium-bottom">
                <div class="uk-grid-small" uk-grid>
                    <div class="uk-width-1-4@s">
                        <label>Ingredient Name</label>
                        <input type="text" name="ingredients[0][name]" class="uk-input" placeholder="e.g., Rice"
                            required>
                    </div>
                    <div class="uk-width-1-4@s">
                        <label>Unit</label>
                        <input type="text" name="ingredients[0][unit]" class="uk-input" placeholder="e.g., kg" required>
                    </div>
                    <div class="uk-width-1-4@s">
                        <label>Quantity</label>
                        <input type="number" name="ingredients[0][quantity]" class="uk-input" placeholder="e.g., 1"
                            min="1" required>
                    </div>
                    <div class="uk-width-1-4@s">
                        <label>Price</label>
                        <input type="number" name="ingredients[0][price]" class="uk-input" placeholder="e.g., 100"
                            min="0" required>
                    </div>
                    <div class="uk-width-1-4@s">
                        <label>Type</label>
                        <select name="ingredients[0][type]" class="uk-select" required>
                            <option value="" disabled selected>Select Type</option>
                            <option value="variable">Variable</option>
                            <option value="fixed">Fixed</option>
                        </select>
                    </div>
                    <div class="uk-width-auto">
                        <button type="button" class="uk-button uk-button-danger remove-ingredient-btn">Remove</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Ingredient Button -->
        <button type="button" id="addIngredientBtn" class="uk-button uk-button-secondary">Add Another
            Ingredient</button>

        <!-- Submit Button -->
        <div class="uk-margin uk-margin-large-top">
            <button type="submit" class="uk-button uk-button-primary">Save Ingredients</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let ingredientCount = 1;

        // Add another ingredient row
        document.getElementById('addIngredientBtn').addEventListener('click', () => {
            const container = document.getElementById('ingredientsContainer');
            const newRow = `
                <div class="ingredient-row uk-card uk-card-default uk-card-body uk-margin-medium-bottom">
                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-1-4@s">
                            <label>Ingredient Name</label>
                            <input type="text" name="ingredients[${ingredientCount}][name]" class="uk-input" placeholder="e.g., Rice" required>
                        </div>
                        <div class="uk-width-1-4@s">
                            <label>Unit</label>
                            <input type="text" name="ingredients[${ingredientCount}][unit]" class="uk-input" placeholder="e.g., kg" required>
                        </div>
                        <div class="uk-width-1-4@s">
                            <label>Quantity</label>
                            <input type="number" name="ingredients[${ingredientCount}][quantity]" class="uk-input" placeholder="e.g., 1" min="1" required>
                        </div>
                        <div class="uk-width-1-4@s">
                            <label>Price</label>
                            <input type="number" name="ingredients[${ingredientCount}][price]" class="uk-input" placeholder="e.g., 100" min="0" required>
                        </div>
                        <div class="uk-width-1-4@s">
                            <label>Type</label>
                            <select name="ingredients[${ingredientCount}][type]" class="uk-select" required>
                                <option value="" disabled selected>Select Type</option>
                                <option value="variable">Variable</option>
                                <option value="fixed">Fixed</option>
                            </select>
                        </div>
                        <div class="uk-width-auto">
                            <button type="button" class="uk-button uk-button-danger remove-ingredient-btn">Remove</button>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newRow);
            ingredientCount++;
        });

        // Remove ingredient row
        document.getElementById('ingredientsContainer').addEventListener('click', (e) => {
            if (e.target.classList.contains('remove-ingredient-btn')) {
                e.target.closest('.ingredient-row').remove();
            }
        });
    });
</script>

@endsection