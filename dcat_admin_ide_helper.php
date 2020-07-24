<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection roles
     * @property Grid\Column|Collection permissions
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection user
     * @property Grid\Column|Collection method
     * @property Grid\Column|Collection path
     * @property Grid\Column|Collection ip
     * @property Grid\Column|Collection input
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection alias
     * @property Grid\Column|Collection authors
     * @property Grid\Column|Collection enable
     * @property Grid\Column|Collection imported
     * @property Grid\Column|Collection config
     * @property Grid\Column|Collection require
     * @property Grid\Column|Collection require_dev
     * @property Grid\Column|Collection orderName
     * @property Grid\Column|Collection brief
     * @property Grid\Column|Collection sort
     * @property Grid\Column|Collection classifications
     * @property Grid\Column|Collection holdersid
     * @property Grid\Column|Collection orderdetails
     * @property Grid\Column|Collection Slideshow
     * @property Grid\Column|Collection portraitimg
     * @property Grid\Column|Collection study
     * @property Grid\Column|Collection details
     * @property Grid\Column|Collection img
     * @property Grid\Column|Collection contentimg
     * @property Grid\Column|Collection logimg
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection order_no
     * @property Grid\Column|Collection payment_type
     * @property Grid\Column|Collection payment
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection end_time
     * @property Grid\Column|Collection width
     * @property Grid\Column|Collection close_time
     * @property Grid\Column|Collection nickname
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection email_verified_at
     * @property Grid\Column|Collection openid
     * @property Grid\Column|Collection wxJson
     * @property Grid\Column|Collection session_key
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection uid
     * @property Grid\Column|Collection phone
     * @property Grid\Column|Collection address
     * @property Grid\Column|Collection province
     * @property Grid\Column|Collection city
     * @property Grid\Column|Collection areas
     * @property Grid\Column|Collection is_default
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection quantity
     * @property Grid\Column|Collection money
     * @property Grid\Column|Collection recommendimg
     * @property Grid\Column|Collection skillname
     * @property Grid\Column|Collection skiicontent
     * @property Grid\Column|Collection skiimoney
     * @property Grid\Column|Collection entcontent
     * @property Grid\Column|Collection cooperation
     * @property Grid\Column|Collection technicalfields
     * @property Grid\Column|Collection courier
     * @property Grid\Column|Collection order_id
     * @property Grid\Column|Collection state
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection research
     * @property Grid\Column|Collection education
     * @property Grid\Column|Collection hoid
     * @property Grid\Column|Collection comid
     * @property Grid\Column|Collection total_price
     * @property Grid\Column|Collection single_price
     *
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection roles(string $label = null)
     * @method Grid\Column|Collection permissions(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection user(string $label = null)
     * @method Grid\Column|Collection method(string $label = null)
     * @method Grid\Column|Collection path(string $label = null)
     * @method Grid\Column|Collection ip(string $label = null)
     * @method Grid\Column|Collection input(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection alias(string $label = null)
     * @method Grid\Column|Collection authors(string $label = null)
     * @method Grid\Column|Collection enable(string $label = null)
     * @method Grid\Column|Collection imported(string $label = null)
     * @method Grid\Column|Collection config(string $label = null)
     * @method Grid\Column|Collection require(string $label = null)
     * @method Grid\Column|Collection require_dev(string $label = null)
     * @method Grid\Column|Collection orderName(string $label = null)
     * @method Grid\Column|Collection brief(string $label = null)
     * @method Grid\Column|Collection sort(string $label = null)
     * @method Grid\Column|Collection classifications(string $label = null)
     * @method Grid\Column|Collection holdersid(string $label = null)
     * @method Grid\Column|Collection orderdetails(string $label = null)
     * @method Grid\Column|Collection Slideshow(string $label = null)
     * @method Grid\Column|Collection portraitimg(string $label = null)
     * @method Grid\Column|Collection study(string $label = null)
     * @method Grid\Column|Collection details(string $label = null)
     * @method Grid\Column|Collection img(string $label = null)
     * @method Grid\Column|Collection contentimg(string $label = null)
     * @method Grid\Column|Collection logimg(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection order_no(string $label = null)
     * @method Grid\Column|Collection payment_type(string $label = null)
     * @method Grid\Column|Collection payment(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection end_time(string $label = null)
     * @method Grid\Column|Collection width(string $label = null)
     * @method Grid\Column|Collection close_time(string $label = null)
     * @method Grid\Column|Collection nickname(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     * @method Grid\Column|Collection openid(string $label = null)
     * @method Grid\Column|Collection wxJson(string $label = null)
     * @method Grid\Column|Collection session_key(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection uid(string $label = null)
     * @method Grid\Column|Collection phone(string $label = null)
     * @method Grid\Column|Collection address(string $label = null)
     * @method Grid\Column|Collection province(string $label = null)
     * @method Grid\Column|Collection city(string $label = null)
     * @method Grid\Column|Collection areas(string $label = null)
     * @method Grid\Column|Collection is_default(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection quantity(string $label = null)
     * @method Grid\Column|Collection money(string $label = null)
     * @method Grid\Column|Collection recommendimg(string $label = null)
     * @method Grid\Column|Collection skillname(string $label = null)
     * @method Grid\Column|Collection skiicontent(string $label = null)
     * @method Grid\Column|Collection skiimoney(string $label = null)
     * @method Grid\Column|Collection entcontent(string $label = null)
     * @method Grid\Column|Collection cooperation(string $label = null)
     * @method Grid\Column|Collection technicalfields(string $label = null)
     * @method Grid\Column|Collection courier(string $label = null)
     * @method Grid\Column|Collection order_id(string $label = null)
     * @method Grid\Column|Collection state(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection research(string $label = null)
     * @method Grid\Column|Collection education(string $label = null)
     * @method Grid\Column|Collection hoid(string $label = null)
     * @method Grid\Column|Collection comid(string $label = null)
     * @method Grid\Column|Collection total_price(string $label = null)
     * @method Grid\Column|Collection single_price(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection id
     * @property Show\Field|Collection username
     * @property Show\Field|Collection name
     * @property Show\Field|Collection roles
     * @property Show\Field|Collection permissions
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection user
     * @property Show\Field|Collection method
     * @property Show\Field|Collection path
     * @property Show\Field|Collection ip
     * @property Show\Field|Collection input
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection version
     * @property Show\Field|Collection alias
     * @property Show\Field|Collection authors
     * @property Show\Field|Collection enable
     * @property Show\Field|Collection imported
     * @property Show\Field|Collection config
     * @property Show\Field|Collection require
     * @property Show\Field|Collection require_dev
     * @property Show\Field|Collection orderName
     * @property Show\Field|Collection brief
     * @property Show\Field|Collection sort
     * @property Show\Field|Collection classifications
     * @property Show\Field|Collection holdersid
     * @property Show\Field|Collection orderdetails
     * @property Show\Field|Collection Slideshow
     * @property Show\Field|Collection portraitimg
     * @property Show\Field|Collection study
     * @property Show\Field|Collection details
     * @property Show\Field|Collection img
     * @property Show\Field|Collection contentimg
     * @property Show\Field|Collection logimg
     * @property Show\Field|Collection content
     * @property Show\Field|Collection order_no
     * @property Show\Field|Collection payment_type
     * @property Show\Field|Collection payment
     * @property Show\Field|Collection status
     * @property Show\Field|Collection end_time
     * @property Show\Field|Collection width
     * @property Show\Field|Collection close_time
     * @property Show\Field|Collection nickname
     * @property Show\Field|Collection email
     * @property Show\Field|Collection email_verified_at
     * @property Show\Field|Collection openid
     * @property Show\Field|Collection wxJson
     * @property Show\Field|Collection session_key
     * @property Show\Field|Collection password
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection uid
     * @property Show\Field|Collection phone
     * @property Show\Field|Collection address
     * @property Show\Field|Collection province
     * @property Show\Field|Collection city
     * @property Show\Field|Collection areas
     * @property Show\Field|Collection is_default
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection quantity
     * @property Show\Field|Collection money
     * @property Show\Field|Collection recommendimg
     * @property Show\Field|Collection skillname
     * @property Show\Field|Collection skiicontent
     * @property Show\Field|Collection skiimoney
     * @property Show\Field|Collection entcontent
     * @property Show\Field|Collection cooperation
     * @property Show\Field|Collection technicalfields
     * @property Show\Field|Collection courier
     * @property Show\Field|Collection order_id
     * @property Show\Field|Collection state
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection research
     * @property Show\Field|Collection education
     * @property Show\Field|Collection hoid
     * @property Show\Field|Collection comid
     * @property Show\Field|Collection total_price
     * @property Show\Field|Collection single_price
     *
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection roles(string $label = null)
     * @method Show\Field|Collection permissions(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection user(string $label = null)
     * @method Show\Field|Collection method(string $label = null)
     * @method Show\Field|Collection path(string $label = null)
     * @method Show\Field|Collection ip(string $label = null)
     * @method Show\Field|Collection input(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection alias(string $label = null)
     * @method Show\Field|Collection authors(string $label = null)
     * @method Show\Field|Collection enable(string $label = null)
     * @method Show\Field|Collection imported(string $label = null)
     * @method Show\Field|Collection config(string $label = null)
     * @method Show\Field|Collection require(string $label = null)
     * @method Show\Field|Collection require_dev(string $label = null)
     * @method Show\Field|Collection orderName(string $label = null)
     * @method Show\Field|Collection brief(string $label = null)
     * @method Show\Field|Collection sort(string $label = null)
     * @method Show\Field|Collection classifications(string $label = null)
     * @method Show\Field|Collection holdersid(string $label = null)
     * @method Show\Field|Collection orderdetails(string $label = null)
     * @method Show\Field|Collection Slideshow(string $label = null)
     * @method Show\Field|Collection portraitimg(string $label = null)
     * @method Show\Field|Collection study(string $label = null)
     * @method Show\Field|Collection details(string $label = null)
     * @method Show\Field|Collection img(string $label = null)
     * @method Show\Field|Collection contentimg(string $label = null)
     * @method Show\Field|Collection logimg(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection order_no(string $label = null)
     * @method Show\Field|Collection payment_type(string $label = null)
     * @method Show\Field|Collection payment(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection end_time(string $label = null)
     * @method Show\Field|Collection width(string $label = null)
     * @method Show\Field|Collection close_time(string $label = null)
     * @method Show\Field|Collection nickname(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     * @method Show\Field|Collection openid(string $label = null)
     * @method Show\Field|Collection wxJson(string $label = null)
     * @method Show\Field|Collection session_key(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection uid(string $label = null)
     * @method Show\Field|Collection phone(string $label = null)
     * @method Show\Field|Collection address(string $label = null)
     * @method Show\Field|Collection province(string $label = null)
     * @method Show\Field|Collection city(string $label = null)
     * @method Show\Field|Collection areas(string $label = null)
     * @method Show\Field|Collection is_default(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection quantity(string $label = null)
     * @method Show\Field|Collection money(string $label = null)
     * @method Show\Field|Collection recommendimg(string $label = null)
     * @method Show\Field|Collection skillname(string $label = null)
     * @method Show\Field|Collection skiicontent(string $label = null)
     * @method Show\Field|Collection skiimoney(string $label = null)
     * @method Show\Field|Collection entcontent(string $label = null)
     * @method Show\Field|Collection cooperation(string $label = null)
     * @method Show\Field|Collection technicalfields(string $label = null)
     * @method Show\Field|Collection courier(string $label = null)
     * @method Show\Field|Collection order_id(string $label = null)
     * @method Show\Field|Collection state(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection research(string $label = null)
     * @method Show\Field|Collection education(string $label = null)
     * @method Show\Field|Collection hoid(string $label = null)
     * @method Show\Field|Collection comid(string $label = null)
     * @method Show\Field|Collection total_price(string $label = null)
     * @method Show\Field|Collection single_price(string $label = null)
     */
    class Show {}

    /**
     * @method \Dcat\Admin\Form\Field\Button button(...$params)
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
