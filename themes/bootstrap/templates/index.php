<?php 
/**
 * Template Name: Index
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap 1.0
*/
get_header(); ?>
<div>
    <div class="container py-0">
        <div class="my-3">
            <button class="hoje btn btn-outline-dark">
                <strong>
                    Hoje
                </strong>
            </button>
            <i class="bi bi-chevron-left"></i>
            <span>Abril</span>
            <i class="bi bi-calendar4"></i>
        </div>
        <div class="aviso text-center py-2 my-3">
            <i class="bi bi-calendar-x"></i>
            <span>Não há acontecimentos próximos</span>
        </div>
        <h3 class="my-3">
            <b>
                Últimos acontecimentos
            </b>
        </h3>
        <div class="row my-3">
            <div class="col-2 d-sm-flex d-none">
                <div class="data rounded-circle text-center">
                    <span class="mes">
                        DEZ
                    </span>
                    <br>
                    <span class="dia">
                        <strong>
                            30
                        </strong>
                    </span>
                    <br>
                    <span class="ano">
                        2021
                    </span>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="data-mb mb-3 p-3 text-center w-100 d-sm-none">
                    <span>
                        <b>
                            30 de Dezembro de 2021
                        </b>
                    </span>
                </div>
                <div class="card d-flex flex-column px-sm-3">
                    <div class="row g-0">
                        <div class="col-md-10">
                            <div class="card-body">
                                <h3 class="card-title">
                                    <b>
                                        [Título]
                                    </b>
                                </h3>
                                <div class="card-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc augue dolor,
                                    tincidunt
                                    quis
                                    suscipit non, scelerisque eget felis. Fusce non sollicitudin massa, eget
                                    venenatis
                                    sapien.
                                    Integer eget quam tempus, convallis nisl nec, ultricies erat. Integer vestibulum
                                    lorem ut
                                    orci dictum ullamcorper. In bibendum a turpis et tempor. Proin lorem tellus,
                                    venenatis sit
                                    amet velit sed, tempor fermentum augue. Duis vitae eleifend est, at lobortis
                                    dolor.
                                    Etiam
                                    tincidunt magna orci, non semper turpis blandit ac. Nullam posuere dui quis
                                    nulla
                                    rhoncus
                                    convallis. Nam bibendum, ipsum eu vulputate venenatis, nulla nisi dictum tellus,
                                    vitae
                                    vulputate erat justo at est. Sed ac diam eget mi lobortis gravida ac ut lorem.
                                    Nullam
                                    tincidunt congue leo, quis egestas nunc tincidunt in. Vivamus ut dapibus velit.
                                </div>
                                <a href="style.css">Ler mais >></a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <img src="img.png" class="img-fluid p-3 rounded-3" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (have_posts()) : while (have_posts()) :   the_post(); ?>
            <h2>
                <a href="<?php the_permalink() ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
            <?php the_content(); ?>
        <?php endwhile;
    else : ?>
        <p>There no posts to show</p>
    <?php endif; ?>
</div>
<!-- <?php get_footer(); ?> -->