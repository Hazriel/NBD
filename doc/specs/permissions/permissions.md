# Rationale
Permission power comes with many limitations:

- Impossible to manage groups independantly.
- Can be confusing if not used to this system.
- Human errors can easily happen and take time to notice.

# New Specifications
## Package
Roles and permissions will be implemented using https://github.com/spatie/laravel-permission

## General rules
Any role or user that has the permission to create a resource (such as a news, forum, etc) should also be able to update and delete its own resource.

## Permission model
### Admin
- `admin.access` : can access the admin dashboard and its functionnalities.
- `admin.ban` : can ban any user.
- `admin.update-users` : can update any user.
- `admin.delete-users` : can delete any user.

### Category
- `category.create` : can create a forum category.
- `category-[id].view` : can view the category with the corresponding `id`.
- `category-[id].update` : can update the category with the corresponding `id`.
- `category-[id].archive` : can archive the category with the corresponding `id`.
- `category-[id].delete` : can delete permanently the category with the corresponding `id` from the database.
- `category-[id].create-forum` : can create a forum in the specific category.

### Forum
Since a forum belongs to a category, a user must first have the permission to access the category before to perform any subsequent operation on a forum.

Create, update, delete and archive permissions are already set in the category where the forum belongs.

- `forum-[id].view` : can view a forum.
- `forum-[id].update` : can update the forum with corresponding `id`.
- `forum-[id].archive` : can archive the forum with corresponding `id`.
- `forum-[id].delete` : can delete the forum with corresponding `id`.
- `forum-[id].create-topic` : can create a topic in the forum with the corresponding `id`.
- `forum-[id].announcement` : can create, update and manage announcements in the forum with the corresponding 'id'.
- `forum-[id].manage` : global permission for managing topic and posts. Any role having this permission will be free to update and delete any post or topic in the forum with the corresponding `id`.

### News
- `news.create` : can create news.
- `news.update` : can update any news.
- `news.delete` : can delete any news.
- `news-[id].view` : can view the news with the corresponding `id`.
