<!-- ======= Start of Call for Papers Section ======= -->
<section id="cfp" class="about">
  <div class="container my-5">
    <div class="row">
      <div class="col-12">
        <h1 class="text-center mb-4">Call for Papers</h1>

        <p>
          The <strong>International Conference on Artificial Intelligence for Mental Health (ICAIMH) 2026</strong> invites submissions that explore the
          transformative role of artificial intelligence in mental health.
          ICAIMH brings together researchers, practitioners, and industry
          professionals from AI, psychology, psychiatry, and healthcare to
          address the latest advancements, challenges, and ethical
          considerations in AI-driven mental health applications.
        </p>

        <p>
          Accepted papers will be published in <strong>Springer's Communications in Computer and Information Science (CCIS)</strong> series, an internationally recognized publication indexed in major academic databases.
        </p>

        <div class="alert alert-info" role="alert">
          <p class="mb-0">
            📍 <strong>Facultad de Psicología, Universidad Autónoma de Yucatán</strong><br>
            <strong>Mérida, Yucatán, México</strong><br>
            <strong>July 1-3, 2026</strong>
          </p>
        </div>

        <?php
        include('src/components/cfpCardComponent.php');

        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>
          We welcome full and short papers on topics including, but
          not limited to:
        </p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            AI-driven prevention, detection, and treatment of mental
            health conditions
          </li>
          <li class="list-group-item">
            Natural language processing for emotion or mental health
            condition recognition
          </li>
          <li class="list-group-item">
            Intelligent agents and chatbots for mental health support
          </li>
          <li class="list-group-item">
            Expert systems in psychology and psychiatry
          </li>
          <li class="list-group-item">
            Computer vision and digital image processing in
            neuroimaging
          </li>
          <li class="list-group-item">
            Ethical considerations in AI for mental health
          </li>
          <li class="list-group-item">
            Human-Computer Interaction in AI-driven mental health
            tools
          </li>
          <li class="list-group-item">
            IoT applications for biomarker monitoring
          </li>
          <li class="list-group-item">
            Pattern recognition in psychological data
          </li>
          <li class="list-group-item">
            Data science for knowledge discovery in large
            user-generated datasets
          </li>
          <li class="list-group-item">
            Machine learning applications in mental health data
            analysis
          </li>
          <li class="list-group-item">
            Research on mental health status at various demographic
            levels
          </li>
          <li class="list-group-item">
            Serious video game development for mental health
          </li>
          <li class="list-group-item">
            Data processing and analysis focused on emotion or mental
            health condition recognition
          </li>
        </ul>
        <?php
        renderCfpCard('Focus Areas', ob_get_clean());
        ?>
        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>ICAIMH 2026 welcomes original research contributions that have not been previously published or submitted for publication elsewhere. We accept two types of submissions:</p>

        <div class="submission-type mb-4">
          <h3 class="h5 fw-bold">Full Papers (12-15 pages)</h3>
          <p>
            Full research papers presenting original, high-quality contributions with comprehensive experimental validation, theoretical analysis, or systematic reviews. Full papers should be <strong>12-15 pages</strong> in Springer CCIS format (each page containing approximately <strong>300-400 words</strong>).
          </p>
        </div>

        <div class="submission-type mb-4">
          <h3 class="h5 fw-bold">Short Papers (6-11 pages)</h3>
          <p>
            Short papers presenting preliminary results, novel ideas, work-in-progress research, or significant perspectives. Short papers should be <strong>6-11 pages</strong> in Springer CCIS format (each page containing approximately <strong>300-400 words</strong>).
          </p>
        </div>
        <?php
        renderCfpCard('Types of Submissions', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>Accepted papers will be published in <strong>Springer's Communications in Computer and Information Science (CCIS)</strong> series. CCIS is:</p>

        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            An internationally recognized series for computer science conference proceedings
          </li>
          <li class="list-group-item">
            Published both in print and electronically via SpringerLink
          </li>
          <li class="list-group-item">
            Indexed in major academic databases including:
            <ul class="mt-2">
              <li>Scopus</li>
              <li>EI Compendex</li>
              <li>Google Scholar</li>
              <li>DBLP</li>
              <li>Mathematical Reviews</li>
              <li>SCImago</li>
              <li>zbMATH</li>
            </ul>
          </li>
          <li class="list-group-item">
            Submitted for inclusion in ISI Proceedings
          </li>
        </ul>
        <?php
        renderCfpCard('Publication in Springer CCIS', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <h3 class="h5 fw-bold">Formatting Requirements</h3>
        <p>
          All submissions must be formatted according to the <strong>Springer CCIS template</strong>. The use of <strong>LaTeX is strongly recommended</strong> for ease of formatting and compliance with publication standards.
        </p>
        <p>
          <strong>Download templates and instructions:</strong><br>
          <a href="https://www.springer.com/gp/computer-science/lncs/conference-proceedings-guidelines" target="_blank">https://www.springer.com/gp/computer-science/lncs/conference-proceedings-guidelines</a>
        </p>
        <p>
          Templates are available in both <strong>LaTeX</strong> and <strong>Microsoft Word</strong> formats.
        </p>

        <h3 class="h5 mt-4">Submission Platform</h3>
        <p>
          All submissions must be made electronically via <strong>Springer's Meteor platform</strong>. The submission portal link will be announced on the conference website.
        </p>
        <?php
        renderCfpCard('Submission Guidelines', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>ICAIMH 2026 follows a rigorous <strong>double-blind peer review process</strong>. Authors must ensure that:</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            No author names or identifying information appear in the submitted manuscript
          </li>
          <li class="list-group-item">
            Institutional affiliations are removed from the submission
          </li>
          <li class="list-group-item">
            Self-citations are written in third person (e.g., <em>"Smith et al. [1] demonstrated..."</em> rather than <em>"We demonstrated [1]..."</em>)
          </li>
          <li class="list-group-item">
            Acknowledgments are removed or anonymized
          </li>
        </ul>
        <div class="alert alert-warning mt-3" role="alert">
          Submissions that do not comply with anonymization requirements will be <strong>desk-rejected without review</strong>.
        </div>
        <?php
        renderCfpCard('Double-Blind Review Process', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>All authors must comply with <strong>Springer Nature's Code of Conduct for Book Authors</strong> and ethical standards. This includes:</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            No plagiarism or self-plagiarism
          </li>
          <li class="list-group-item">
            No duplicate submissions or "salami publishing"
          </li>
          <li class="list-group-item">
            Proper attribution and permissions for third-party content
          </li>
          <li class="list-group-item">
            Disclosure of conflicts of interest where applicable
          </li>
        </ul>
        <p class="mt-3">
          <strong>For complete ethical guidelines, visit:</strong><br>
          <a href="https://www.springernature.com/gp/authors/book-authors-code-of-conduct" target="_blank">https://www.springernature.com/gp/authors/book-authors-code-of-conduct</a>
        </p>
        <?php
        renderCfpCard('Ethics and Compliance', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>
          All submissions must be written in <strong>English</strong>. Authors are responsible for ensuring their manuscripts are written in clear, grammatically correct English. Papers with poor English quality that impedes understanding may be rejected without review.
        </p>
        <?php
        renderCfpCard('Language Requirements', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>Authors of accepted papers will be required to:</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            Submit source files (LaTeX or Word) following Springer CCIS formatting guidelines
          </li>
          <li class="list-group-item">
            Complete and sign the Springer License to Publish agreement
          </li>
          <li class="list-group-item">
            Address all reviewer comments and incorporate required revisions
          </li>
          <li class="list-group-item">
            Include ORCID identifiers for all authors (recommended)
          </li>
          <li class="list-group-item">
            Register for the conference and ensure at least one author presents the paper in person
          </li>
        </ul>
        <?php
        renderCfpCard('Camera-Ready Submission', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>ICAIMH 2026 is an <strong>in-person conference</strong>. All accepted papers must be presented orally at the conference by at least one author.</p>
        <div class="alert alert-danger mt-3" role="alert">
          <strong>No-Show Policy:</strong> Papers that are not presented at the conference will be removed from the proceedings and will not be published in the Springer CCIS volume.
        </div>
        <p>Remote presentations are <strong>not permitted</strong>.</p>
        <?php
        renderCfpCard('Presentation Requirements', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p><strong>Publication Fee:</strong> A publication fee of <strong>€200 (EUR)</strong>, <strong>$225 (USD)</strong>, or <strong>$4,000 (MXN)</strong> is required for each accepted paper. This fee covers:</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            Publication in Springer CCIS proceedings
          </li>
          <li class="list-group-item">
            Conference registration for one author (the submitting/presenting author)
          </li>
          <li class="list-group-item">
            Certificate of participation
          </li>
          <li class="list-group-item">
            Welcome kit
          </li>
        </ul>
        <div class="alert alert-info mt-3" role="alert">
          <strong>Important:</strong> One registration covers one paper. Additional authors wishing to attend must register separately. Registration fees for additional attendees (both student and regular rates) will be announced soon.
        </div>
        <p>Payment details and invoicing instructions will be provided to authors upon acceptance of their submission.</p>
        <?php
        renderCfpCard('Registration and Fees', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <p>
          Authors interested in <strong>Open Access publishing</strong> (making their paper freely accessible to all readers immediately upon publication) may opt for <strong>Springer's Open Choice program</strong> after acceptance.
        </p>
        <p>
          Open Access fees and arrangements are handled directly with Springer Nature. For more information, visit:<br>
          <a href="https://www.springer.com/gp/computer-science/lncs/open-access-publishing" target="_blank">https://www.springer.com/gp/computer-science/lncs/open-access-publishing</a>
        </p>
        <div class="alert alert-secondary mt-3" role="alert">
          <strong>Note:</strong> Open Access is optional. All papers will be published in the standard Springer CCIS proceedings volume, which is available to subscribing institutions worldwide through SpringerLink.
        </div>
        <?php
        renderCfpCard('Open Access Publishing Option', ob_get_clean());
        ?>
        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead class="table-primary">
              <tr>
                <th>Milestone</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Submission Deadline</td>
                <td><strong>April 1, 2026</strong></td>
              </tr>
              <tr>
                <td>Notification of Acceptance</td>
                <td><strong>April 21, 2026</strong></td>
              </tr>
              <tr>
                <td>Camera-Ready Submission</td>
                <td><strong>May 6, 2026</strong></td>
              </tr>
              <tr>
                <td>Conference Dates</td>
                <td><strong>July 1-3, 2026</strong></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="alert alert-info mt-3" role="alert">
          All deadlines are at <strong>23:59 (11:59 PM) Anywhere on Earth (AoE)</strong> time zone.
        </div>
        <?php
        renderCfpCard('Important Dates', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <strong>Mauricio Gabriel Orozco-del-Castillo</strong><br>
            Tecnológico Nacional de México/Instituto Tecnológico de Mérida, Mexico
          </li>
          <li class="list-group-item">
            <strong>Juan Antonio Recio-García</strong><br>
            Universidad Complutense de Madrid, Spain
          </li>
          <li class="list-group-item">
            <strong>Stylianos Kapetanakis</strong><br>
            Middlesex University, United Kingdom
          </li>
          <li class="list-group-item">
            <strong>Pedro A.G. Ortiz-Sanchez</strong><br>
            Tecnológico Nacional de México/Instituto Tecnológico de Mérida, Mexico
          </li>
        </ul>
        <?php
        renderCfpCard('Program Committee Chairs', ob_get_clean());
        ?>

        <?php
        // Iniciar el buffering de salida
        ob_start();
        ?>
        <div class="text-center">
          <p>
            We look forward to your contributions to ICAIMH 2026, where
            research innovations in AI for mental health will continue
            to push the boundaries of interdisciplinary collaboration.
          </p>
          <p>
            For questions regarding submissions, technical issues, or general inquiries, please contact us at:<br>
            <a href="mailto:icaimh2026@icaimh.org"><strong>icaimh2026@icaimh.org</strong></a>
          </p>
          <p>
            For the latest updates, submission guidelines, and conference information, please visit our website:<br>
            <a href="https://2026.icaimh.org" target="_blank"><strong>https://2026.icaimh.org</strong></a>
          </p>
          <div class="alert alert-success" role="alert">
            <strong>Join us in advancing AI innovations for mental health solutions at ICAIMH 2026!</strong>
          </div>
        </div>
        <?php
        renderCfpCard('Contact Information', ob_get_clean());
        ?>
      </div>
    </div>
  </div>
</section>

<!-- ======= End of Call for Papers Section ======= -->