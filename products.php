<?php
include("includes/header.php");
require_once("admin/includes/init.php");


//variabelen voor het vullen van de parameters in de constructor van de class Paginate.
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Product::count_all();

//de constructor aanroepen
$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";
$products = Product::find_this_query($sql);
?>

	<div class="col-md-8">
		<div class="row">
			<?php foreach($products as $product) : ?>
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<img class="img-fluid" src="admin/<?= $product->picture_path(); ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?= $product->title; ?></h5>
						<p class="card-text"><?= $product->description; ?></p>
						<a href="photo.php?id=<?= $product->id ?>" class="btn btn-primary">Read blog item</a>
					</div>
				</div>
			</div>
            <?php endforeach; ?>
		</div>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<nav aria-label="...">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="index.php?page=<?= $paginate->previous()?>"
							   tabindex="-1" aria-disabled="true">Previous</a>
						</li>


						<?php
                        for($i=1;$i <= $paginate->page_total();$i++){
                        if($i == $paginate->current_page){

                            echo "<li class='page-item active'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                            }else{
                          echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                              }}
						?>

						<li class="page-item">
							<a class="page-link" href="index.php?page=<?= $paginate->next()?>">Next</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>
	</div>

<?php include("includes/footer.php"); ?>

