FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

RUN a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# === SUPPRIMER ET RECRÉER routes/web.php ===
RUN rm -f /var/www/html/routes/web.php && \
    echo '<?php' > /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo 'use Illuminate\Support\Facades\Route;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Site\AccueilController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Site\ProgrammeController as SiteProgrammeController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Site\ActualiteController as SiteActualiteController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Site\ContactController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Site\AProposController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Site\PartenaireController as SitePartenaireController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\DemandePartenaireController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Site\DeposerProjetController;' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Admin\AuthController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Admin\DashboardController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Admin\ProgrammeController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Admin\ActualiteController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Admin\CandidatureController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Admin\PartenaireController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Admin\DemandeController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Admin\ProjetController as AdminProjetController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Admin\DemandePartenaireController as AdminDemandePartenaireController;' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\Admin\MonitoringController;' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo 'use App\Http\Controllers\ProjetController;' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo '// ============================================================' >> /var/www/html/routes/web.php && \
    echo '// ROUTES DU SITE PUBLIC' >> /var/www/html/routes/web.php && \
    echo '// ============================================================' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/", [AccueilController::class, "index"])->name("accueil");' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/programmes", [SiteProgrammeController::class, "index"])->name("programmes.index");' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/programmes/{id}", [SiteProgrammeController::class, "show"])->name("programmes.show");' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/programmes/{id}/candidature", [SiteProgrammeController::class, "candidature"])->name("programmes.candidature");' >> /var/www/html/routes/web.php && \
    echo 'Route::post("/programmes/{id}/postuler", [SiteProgrammeController::class, "postuler"])->name("programmes.postuler");' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/actualites", [SiteActualiteController::class, "index"])->name("actualites.index");' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/actualites/{id}", [SiteActualiteController::class, "show"])->name("actualites.show");' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/partenaires", [SitePartenaireController::class, "index"])->name("partenaires.index");' >> /var/www/html/routes/web.php && \
    echo 'Route::post("/partenaires/devenir", [SitePartenaireController::class, "devenir"])->name("partenaires.devenir");' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/a-propos", [AProposController::class, "index"])->name("a-propos");' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/contact", [ContactController::class, "index"])->name("contact");' >> /var/www/html/routes/web.php && \
    echo 'Route::post("/contact/envoyer", [ContactController::class, "envoyer"])->name("contact.envoyer");' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo 'Route::post("/projets", [ProjetController::class, "store"])->name("projets.store");' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/partenaires/devenir", [DemandePartenaireController::class, "create"])->name("partenaires.devenir");' >> /var/www/html/routes/web.php && \
    echo 'Route::post("/partenaires/devenir", [DemandePartenaireController::class, "store"])->name("partenaires.devenir.store");' >> /var/www/html/routes/web.php && \
    echo 'Route::get("/deposer-projet", [DeposerProjetController::class, "index"])->name("deposer-projet");' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo '// ============================================================' >> /var/www/html/routes/web.php && \
    echo '// ROUTES ADMIN (Dashboard)' >> /var/www/html/routes/web.php && \
    echo '// ============================================================' >> /var/www/html/routes/web.php && \
    echo 'Route::prefix("admin")->name("admin.")->group(function () {' >> /var/www/html/routes/web.php && \
    echo '    Route::get("/login", [AuthController::class, "showLoginForm"])->name("login");' >> /var/www/html/routes/web.php && \
    echo '    Route::post("/login", [AuthController::class, "login"])->name("login");' >> /var/www/html/routes/web.php && \
    echo '    Route::get("/logout", [AuthController::class, "logout"])->name("logout");' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo '    Route::middleware(["admin.auth"])->group(function () {' >> /var/www/html/routes/web.php && \
    echo '        Route::get("/", [DashboardController::class, "index"])->name("dashboard");' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo '        Route::resource("programmes", ProgrammeController::class);' >> /var/www/html/routes/web.php && \
    echo '        Route::resource("actualites", ActualiteController::class);' >> /var/www/html/routes/web.php && \
    echo '        Route::resource("partenaires", PartenaireController::class);' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo '        Route::get("/candidatures", [CandidatureController::class, "index"])->name("candidatures.index");' >> /var/www/html/routes/web.php && \
    echo '        Route::get("/candidatures/{id}", [CandidatureController::class, "show"])->name("candidatures.show");' >> /var/www/html/routes/web.php && \
    echo '        Route::put("/candidatures/{id}/statut", [CandidatureController::class, "updateStatut"])->name("candidatures.statut");' >> /var/www/html/routes/web.php && \
    echo '        Route::delete("/candidatures/{id}", [CandidatureController::class, "destroy"])->name("candidatures.destroy");' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo '        Route::get("/demandes", [DemandeController::class, "index"])->name("demandes.index");' >> /var/www/html/routes/web.php && \
    echo '        Route::get("/demandes/{id}", [DemandeController::class, "show"])->name("demandes.show");' >> /var/www/html/routes/web.php && \
    echo '        Route::put("/demandes/{id}/traite", [DemandeController::class, "marquerTraite"])->name("demandes.traite");' >> /var/www/html/routes/web.php && \
    echo '        Route::delete("/demandes/{id}", [DemandeController::class, "destroy"])->name("demandes.destroy");' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo '        Route::get("/demandes-partenaires", [AdminDemandePartenaireController::class, "index"])->name("demandes-partenaires.index");' >> /var/www/html/routes/web.php && \
    echo '        Route::get("/demandes-partenaires/{id}", [AdminDemandePartenaireController::class, "show"])->name("demandes-partenaires.show");' >> /var/www/html/routes/web.php && \
    echo '        Route::put("/demandes-partenaires/{id}/traite", [AdminDemandePartenaireController::class, "marquerTraite"])->name("demandes-partenaires.traite");' >> /var/www/html/routes/web.php && \
    echo '        Route::delete("/demandes-partenaires/{id}", [AdminDemandePartenaireController::class, "destroy"])->name("demandes-partenaires.destroy");' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo '        Route::prefix("projets")->name("projets.")->group(function () {' >> /var/www/html/routes/web.php && \
    echo '            Route::get("/", [AdminProjetController::class, "index"])->name("index");' >> /var/www/html/routes/web.php && \
    echo '            Route::get("/{id}", [AdminProjetController::class, "show"])->name("show");' >> /var/www/html/routes/web.php && \
    echo '            Route::put("/{id}/statut", [AdminProjetController::class, "updateStatut"])->name("statut");' >> /var/www/html/routes/web.php && \
    echo '            Route::delete("/{id}", [AdminProjetController::class, "destroy"])->name("destroy");' >> /var/www/html/routes/web.php && \
    echo '            Route::post("/{id}/notifier", [AdminProjetController::class, "notifier"])->name("notifier");' >> /var/www/html/routes/web.php && \
    echo '        });' >> /var/www/html/routes/web.php && \
    echo '' >> /var/www/html/routes/web.php && \
    echo '        Route::get("/monitoring", [MonitoringController::class, "index"])->name("monitoring.index");' >> /var/www/html/routes/web.php && \
    echo '    });' >> /var/www/html/routes/web.php && \
    echo '});' >> /var/www/html/routes/web.php

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

RUN sed -i '/<Directory \/var\/www\/html>/c\<Directory \/var\/www\/html/public>\n\tOptions Indexes FollowSymLinks\n\tAllowOverride All\n\tRequire all granted\n</Directory>' /etc/apache2/apache2.conf

RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "log_errors = On" >> /usr/local/etc/php/conf.d/custom.ini

EXPOSE 80

CMD ["apache2-foreground"]
