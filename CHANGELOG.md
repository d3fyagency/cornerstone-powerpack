All notable changes to this project will be documented in this file.

<!--- The format is based on [Keep a Changelog](http://keepachangelog.com/) -->
<!--- and this project adheres to [Semantic Versioning](http://semver.org/). -->

## [Unreleased]

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