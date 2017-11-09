All notable changes to this project will be documented in this file.

<!--- The format is based on [Keep a Changelog](http://keepachangelog.com/) -->
<!--- and this project adheres to [Semantic Versioning](http://semver.org/). -->

## [0.1.19] - 2017-11-09

### Fixed

- Element - Instagram Carousel: Update to allow for more image post types

## [0.1.18] - 2017-11-09

### Fixed

- Element - Instagram Carousel: Update for new Instagram data feed URL and structure

## [0.1.17] - 2017-10-18

### Fixed

- Element - Team Members: Fix container bug introduced with updated version of Cornerstone

## [0.1.16] - 2017-09-01

### Fixed

- Element - Instagram Carousel: IG feed changed, so updated styling to force images to the same proportions (1:1) via CSS

## [0.1.15] - 2017-08-10

### Added

- Element - Carousel: add control for auto-play timeout (time between slide changes)

### Fixed

- Element - Team Members: fix bug where only first team member was outputting to page

## [0.1.14] - 2017-08-02

### Changed

- Updates - Changed the update server to use the new cornerstonelibrary.com domain, and https

### Fixed

- Changelog - Corrected version info in (this) changelog

## [0.1.13] - 2017-07-19

### Added

- Element - Login Form: add new element to include WP login form in content

### Fixed

- Element - Modal: fix admin edit area loop when editing modals that open on page load
- Element - Carousel: fix default image styling (don't force to 100% width, set as max width instead)
- Element - Carousel: make number of visible items responsive (best guess adjustments), optionally

## [0.1.12] - 2017-05-21

### Added

- Element - Modal: add option to hide the OK button (to close modal)
- Element - Team Members: add optional social icon links
- Element - Color Accordion: add updated color accordion element

### Fixed

- Element - Image Overlay: fix bug where vertical gradient didn't cover full height

## [0.1.11] - 2017-05-11

### Added

- Admin: auto-save the loaded elements form when checkbox status changes
- Admin: implement (this) changelog and display in admin panel, replacing Save button

### Changed

- Admin and Modal Element: Prefix Lity lightbox script and styles to avoid conflicts (cspplity)

### Fixed

- Element - Instagram Carousel: Fix CS editor display to not be stacked vertically
- Element - Instagram Carousel: Fix slide opacity bug