# Page Sections Theme
## Requirements
- ACF Pro plugin
- NPM installation

## Theme
**Theme Folder**: `public/wp-content/themes/page-sections/`

**Enable Theme**: WP Admin > Appearance > Themes > Page Sections > Activate

**Sync ACF From Theme JSON**: WP Admin > Custom Fields > Sync > select all options and bulk sync or sync individual field groups

## Page Setup
- WP Admin > Page > New > Set Template (right column) to Page Sections
- Page sections area should now be visible > Add Section
- Arrange sections in any order and populate fields

## Page Sections Configuration
- WP Admin > Custom Fields > Page Sections > Page Sections > Adjust "Layouts" and/or fields within Layouts

## Page Sections Templates
Each page section assigned to a page will load from a corresponding sub-template in `THEME_FOLDER/template-parts/page-sections`. This process starts in `THEME_FOLDER/page-sections.php`.

### Example
A **Hero** page section has been assigned to a page and the fields have been populated. When the page loads the following occurs:

- `page-sections.php` loops through all the page section layouts assigned to the page
    - We hit the **Hero** page section (*The **Hero** layout name is`hero` - see ACF flexible content layouts for labels/names*)
    - The following is loaded: `template-parts/page-sections/PAGE_SECTION_NAME.php` > **`template-parts/page-sections/hero.php`**    
        - The sub-template retrieves data using `get_sub_field()` calls

