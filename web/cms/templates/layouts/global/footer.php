

          <section class="mailing-list">

              <h2 id="mailing-list">Sign up to stay notified</h2>

              <div id="mailing-list__sign-up" class="mailing-list__sign-up--form">

                  <form action="//sambeckham.us3.list-manage.com/subscribe/post?u=9a08ccca86dad8eae63b29a88&amp;id=2524deef25" method="post" class="mailing-list__sign-up__form">
                      <label for="mce-NAME">Name:</label>
                      <input type="text" id="mce-NAME" name="NAME" placeholder="Jeffrey Zeldman" required>
                      <label for="mce-EMAIL">Email Address:</label>
                      <input type="email" id="mce-EMAIL" name="EMAIL" placeholder="jzeldman@happycog.com" required>
                      <button type="submit">Submit</button>
                  </form>

                  <div class="mailing-list__sign-up__loading">
                       <?php include($_SERVER['DOCUMENT_ROOT'].'/cms/templates/includes/svg/loading.svg'); ?>
                  </div>

                  <div class="mailing-list__sign-up__response"></div>
              </div>
          </section>

        </div>
        <aside id="map" class="map"></aside>
    </main>
    <?php perch_get_javascript(); ?>
    <script src="https://js.tito.io/v1" async></script>
</body>
</html>
