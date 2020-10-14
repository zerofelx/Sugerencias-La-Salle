<div class="container p-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
                <form action="database/save_suggestion.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="suggestion_title" id="suggestion_title"
                        class="form-control" placeholder="Título de la sugerencia" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="suggestion" rows="5" id="suggestion" class="form-control" 
                        placeholder="Escríbenos tu sugerencia"></textarea>
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success" name="save_suggestion">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
        
        </div>
    </div>
</div>
