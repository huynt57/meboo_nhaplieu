define({ "api": [
  {
    "type": "post",
    "url": "book/add",
    "title": "Add A Book",
    "name": "Add_Book",
    "group": "Book",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "book_name",
            "description": "<p>Book Name.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "book_author",
            "description": "<p>Book Author.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>Number</p> ",
            "optional": false,
            "field": "book_year",
            "description": "<p>Book Year.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "book_publisher",
            "description": "<p>Book Publisher.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "book_description",
            "description": "<p>Book Description.</p> "
          },
          {
            "group": "Parameter",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "book_image",
            "description": "<p>Book Image.</p> "
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "status",
            "description": "<p>Status of request. 1 if success and 0 for not.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "data",
            "description": "<p>Response data of request.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "message",
            "description": "<p>Message.</p> "
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n  \"status\": 1,\n  \"data\": [],\n  \"message\":Success\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "D:/xampp/htdocs/books/protected/controllers/BookController.php",
    "groupTitle": "Book"
  },
  {
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "optional": false,
            "field": "varname1",
            "description": "<p>No type.</p> "
          },
          {
            "group": "Success 200",
            "type": "<p>String</p> ",
            "optional": false,
            "field": "varname2",
            "description": "<p>With type.</p> "
          }
        ]
      }
    },
    "type": "",
    "url": "",
    "version": "0.0.0",
    "filename": "D:/xampp/htdocs/books/protected/controllers/apidoc/main.js",
    "group": "D__xampp_htdocs_books_protected_controllers_apidoc_main_js",
    "groupTitle": "D__xampp_htdocs_books_protected_controllers_apidoc_main_js",
    "name": ""
  }
] });