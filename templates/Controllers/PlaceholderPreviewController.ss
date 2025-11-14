<!doctype html>
<html lang="de">
    <head>
        <% base_tag %>
        $MetaTags(false)
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta charset="utf-8">
        <title>PlaceholderPreview - $SiteConfig.Title</title>
        $ViteClient.RAW
        <link rel="stylesheet" href="$Vite("app/client/src/scss/main.scss")">

        <link rel="manifest" href="site.webmanifest" />
    </head>
    <body class="placeholder-preview">
        <!-- Sidebar Navigation -->
        <aside class="preview-sidebar">
            <div class="preview-sidebar__header">
                <h3>Preview Navigation</h3>
            </div>
            <nav class="preview-sidebar__nav">
                <ul class="preview-nav-list">
                </ul>
            </nav>
        </aside>

        <!-- Main Content with offset for sidebar -->
        <div class="preview-main-content">
            <div class="area_header">
                <% include Header %>
            </div>
            <main class="area_content main">
                <!-- Typography -->
                <div class="section">
                    <div class="section_content">
                        <h1>Placeholder Preview</h1>
                    </div>
                </div>
                <div class="section section--preview" id="typography">
                    <div class="section_content">
                        <h1>Typography</h1>
                        <h2>Headline 2</h2>
                        <h3>Headline 3</h3>
                        <h4>Headline 4</h4>
                        <h5>Headline 5</h5>
                        <h6>Headline 6</h6>
                        <p>Paragraph</p>
                        <p><strong>Bold</strong></p>
                        <p><em>Italic</em></p>
                        <p><a href="#">Link</a></p>
                        <% include Components/Button ButtonType="PrimaryButton", ButtonTitle="Primärer Button", ButtonLink="test.de" %>
                        <% include Components/Button ButtonType="SecondaryButton", ButtonTitle="Sekundärer Button", ButtonLink="test.de" %>
                        <% include Components/Button ButtonType="TextButton", ButtonTitle="Text Button", ButtonLink="test.de" %>
                        <% include Components/Button ButtonType="LinkButton", ButtonTitle="Link Button", ButtonLink="test.de" %>
                    </div>
                </div>
                <div class="section section-background--gradient">
                    <div class="section_content">
                        <h2>Section mit Hintergrundverlauf</h2>
                        <p>Dies ist eine Section mit einem Farbverlauf als Hintergrund.</p>
                    </div>
                </div>
                <div class="section section-background--gray">
                    <div class="section_content">
                        <h2>Section mit grauem Hintergrund</h2>
                        <p>Dies ist eine Section mit einem grauen Hintergrund.</p>
                    </div>
                </div>

                <!-- TextImageElement -->
                <div class="section section--preview" id="textimage">
                    <div class="section_content">
                        <hr>
                        <h2>Text+Bild Elements</h2>
                    </div>
                </div>
                <% with $getPlaceholdersForElement("TextImageElement") %>
                    <% include App/Elements/TextImageElement Title="Text+Bild (bild links)", ShowTitle=$ShowTitle, Text=$Text, Image=$PlaceholderImage %>
                <% end_with %>

                <% with $getPlaceholdersForElement("TextImageElement") %>
                    <% include App/Elements/TextImageElement Title="Text+Bild (bild rechts)", ShowTitle=$ShowTitle, Text=$Text, Image=$PlaceholderImage, Variant="image--right" %>
                <% end_with %>

                <% with $getPlaceholdersForElement("TextImageElement") %>
                    <% include App/Elements/TextImageElement Title="Text+Bild (Mit Allied Vision Maske)", ShowTitle=$ShowTitle, Text=$Text, Image=$PlaceholderImage, ImageMask="image--mask--alliedvision" %>
                <% end_with %>

                <% with $getPlaceholdersForElement("TextImageElement") %>
                    <% include App/Elements/TextImageElement Title="Text+Bild (Mit Allied Vision Maske)", ShowTitle=$ShowTitle, Text=$Text, Image=$PlaceholderImage, ImageMask="image--mask--alliedvision", Variant="image--right", Button=$PlaceholderButton %>
                <% end_with %>

                <% with $getPlaceholdersForElement("TextImageElement") %>
                    <% include App/Elements/TextImageElement Title="Text+Bild (Nur Text)", ShowTitle=$ShowTitle, Text=$Text, Variant="image--right" %>
                <% end_with %>


                <!-- TeaserElement -->
                <div class="section section--preview" id="teaser">
                    <div class="section_content">
                        <hr>
                        <h2>Teaser Elements</h2>
                    </div>
                </div>
                <% with $getPlaceholdersForElement("TeaserElement") %>
                    <% include App/Elements/TeaserElement Title="Teaser (mit 2 Einträgen)", ShowTitle=true, Text="Hier sind ein paar Beispiel-Teaser:", Teasers=$Teasers.Limit(2) %>
                <% end_with %>

                <% with $getPlaceholdersForElement("TeaserElement") %>
                    <% include App/Elements/TeaserElement Title="Teaser (mit 4 Einträgen)", ShowTitle=true, Text="Hier sind ein paar Beispiel-Teaser:", Teasers=$Teasers.Limit(4) %>
                <% end_with %>

                <% with $getPlaceholdersForElement("TeaserElement") %>
                    <% include App/Elements/TeaserElement Title="Teaser (mit 10 Einträgen)", ShowTitle=true, Text="Hier sind ein paar Beispiel-Teaser:", Teasers=$Teasers.Limit(10) %>
                <% end_with %>

                <!-- TeaserElement -->
                <div class="section section--preview" id="cta">
                    <div class="section_content">
                        <hr>
                        <h2>Call To Action Elements</h2>
                    </div>
                </div>
                <% with $getPlaceholdersForElement("CallToActionElement") %>
                    <% include App/Elements/CallToActionElement Title="Call To Action", ShowTitle=true, Text=$Text, Buttons=$PlaceholderButtons %>
                <% end_with %>
                <% with $getPlaceholdersForElement("CallToActionElement") %>
                    <% include App/Elements/CallToActionElement Title="Call To Action (Ohne Buttons)", ShowTitle=true, Text=$Text %>
                <% end_with %>
                <% with $getPlaceholdersForElement("CallToActionElement") %>
                    <% include App/Elements/CallToActionElement Title="Call To Action (Mit einzelnem Button)", ShowTitle=true, Text=$Text, Buttons=$SingularButton %>
                <% end_with %>
            </main>

            <!-- Footer -->
            <div class="section section--preview" id="footer">
                <div class="section_content">
                    <hr>
                    <h2>Footer</h2>
                </div>
            </div>
            <div class="area_footer">
                <% include Footer %>
            </div>
        </div> <!-- Close preview-main-content -->

        <script type="module" src="$Vite("app/client/src/js/main.js")"></script>
    </body>
</html>
