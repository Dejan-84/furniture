<?php

if (isset($_POST)) {

    require_once '../includes/baza.php'; 

    $conn = database_connection('localhost', 'root', '', 'furniture');


    //POSTAVLJANJE LIMITA ZA BROJ PROIZVODA PO STRANICI
    $proizvodi_po_stranici = 6;  

    //KREIRANJE PROMENJIVIH ZA BROJ STRANICE I HTML OUTPUT
    $stranica = '';  
    $html = '';  

    //AKO JE KLIKNUTO NA ODREDJENU STRANICU,SETUJ PROMENJIVU NA TU VREDNOST.U SUPROTNOM SETUJ NA 1.
    if (isset($_POST['stranica'])) {  

        $stranica = $_POST['stranica'];

    } else { 

        $stranica = 1;  
    } 

    //SETOVANJE OD KOJEG ZAPISA IZ BAZE POCINJE PRIKAZ NA STRANICI
    $pocni_od = ($stranica - 1) * $proizvodi_po_stranici;  
    
    //SETOVANJE PRETHODNE STRANICE

    $prethodna_stranica = $stranica - 1;

    //SETOVANJE SLEDECE STRANICE

    $sledeca_stranica = $stranica + 1;


    //QUERY FOR GETTING ALL PRODUCTS
    $products_query = "SELECT * FROM products ";


    //ZAVRSETAK UPITA ZA DOBIJANJE PODATAKA O PROIZVODIMA
    $products_query .= "ORDER BY product_id DESC LIMIT $pocni_od, $proizvodi_po_stranici";

    $result = mysqli_query($conn,$products_query);

    if (!$result) {
        die ('Greska u upitu.');
    }

    if(mysqli_num_rows($result) > 0) {

        while($rows = mysqli_fetch_assoc($result)) {

            $id = $rows['product_id'];
            $name = $rows['name'];
            $old_price = $rows['old_price'];
            $new_price = $rows['new_price'];
            $picture_path = $rows['picture_path'];

            
            $html .= '<div class="col-sm-4">
                        <div class="product-thumb">
                            <div class="image wow fadeInDown animated">
                                <a href=""><img class="wow fadeInDown animated" src="' .$picture_path. '" alt="Kundli Dosha" title="' .$name. '" width="100%"></a>
                                
                                <div class="sale"><span class="">Sale</span></div>
                                <div class="button-group">';

                                $html .= '<div class="inner">
                                        
                                            <button type="button" title="Quick View" class="button-quickview" data-id="' .$id. '" onclick=""><span>Quick View</span></button>
                                                <button type="button" title="Add to Wish List" class="button-wishlist"><span>Add to Wish List</span></button>
                                                <button type="button" title="Compare this Product" class="button-compare"><span>Compare this Product</span></button>
                                            </div>
                                        </div>
                                </div>';

                            $html .= '<div class="caption">
                                
                                        <div class="rate-and-title">
                                            <h4 class="wow fadeInDown animated"><a href="single-products.html">' .$name. '</a></h4>
                                            <div class="rating wow fadeInDown animated">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <div class="clear"></div>
                                            </div>
                                            <p class="price wow fadeInDown animated">
                                                <span class="price-old">$' .$old_price. '</span> <span class="price-new">$' .$new_price. '</span>  
                                            </p>
                                            <button type="button" class="btn wow fadeInDown animated" onclick="" title="Add to Cart"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                                        </div>
                                    </div>';
                    $html .= '</div>
                            </div>';
        }  
    }
     
    //IZVRSAVANJE UPITA ZA PAGINACIJU
    $pr_query = "SELECT * FROM products";

    $result1 = mysqli_query($conn,$pr_query); 

    //DOBIJANJE BROJA REDOVA I BROJA STRANICA,NA OSNOVU REZULTATA IZ BAZE
    $broj_redova = mysqli_num_rows($result1);  
    $broj_stranica = ceil($broj_redova / $proizvodi_po_stranici); 

    $ukupno = '';

    //DOK IMA STRANICA,GENERISI PAGINATION LINKOVE ZA NJIH
    for($i = 1; $i <= $broj_stranica; $i++) { 
        

        //AKO JE KLIKNUTO NA STRANICU,DODAJ LINKU KLASU ACTIVE(ZBOG CSS-A)
        if ($i == $stranica) {

            $ukupno .= "<span class='pagination_link aktivan-link' id='" .$i. "'>" .$i. "</span>"; 

        } else {
            
            $ukupno .= "<span class='pagination_link' id='" .$i. "'>" .$i. "</span>";  
        }

    }
    
    $html .='
        <div class="text-center">
            <ul class="pagination">
                <li class="page-item"><span class="pagination_link previous" data-name="previous">Previous</span></li>
                <li class="page-item">'.$ukupno.'</li> 
                <li class="page-item"><span class="pagination_link next" data-name="next">Next</span></li>
            </ul>
        </div>';
    //ZATVARANJE DIVA ZA PAGINACIJU
   

    $niz_podaci = array();
    
    
    $niz_podaci['html'] = $html;

    echo json_encode($niz_podaci);  
}   