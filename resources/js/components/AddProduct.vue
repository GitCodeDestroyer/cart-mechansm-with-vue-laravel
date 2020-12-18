<template>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header text-center mb-4">Create a new Product</h2>

                <div class="card-body">
                    <form method="POST" action="/add-product">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <!-- @error('title') is-invalid @enderror -->
                                <input id="title" type="title" class="form-control" name="title" required placeholder="Title..." autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">About</label>

                            <div class="col-md-6">
                                <!-- @error('content') is-invalid @enderror -->
                                <textarea id="about" type="about" class="form-control" name="about" required placeholder="About..."></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Available</label>

                            <div class="col-md-6">
                                <!-- @error('content') is-invalid @enderror -->
                                <label for="no"><input type="radio" name="available" id="no">No</label>
                                <label for="yes"><input type="radio" name="available" id="yes">Yes</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qty" class="col-md-4 col-form-label text-md-right">Q-ty</label>

                            <div class="col-md-6">
                                <!-- @error('content') is-invalid @enderror -->
                                <input id="qty" type="number" class="form-control" name="qty" required placeholder="Q-ty..." value="0" min="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price in so'm</label>

                            <div class="col-md-6">
                                <!-- @error('content') is-invalid @enderror -->
                                <input id="price" type="number" class="form-control" name="price" required placeholder="Price..." value="0" min="0">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="images" class="col-md-4 col-form-label text-md-right">Images</label>

                            <div class="col-md-6">
                                <!-- @error('content') is-invalid @enderror -->
                                <input id="images" type="file" class="form-control" name="images" required placeholder="Images...">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                error: false
            }
        },
        methods: {
            closeCartMenu() {
                document.body.classList.remove('cart-menu-opened')
            },
            openCartMenu() {
                return false;
            }
        },
        created() {
            this.closeCartMenu()
            axios.get('/api/products')
                .then(res => {
                    this.products = res.data
                })
        }
    }
</script>
