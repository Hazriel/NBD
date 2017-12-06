# News

## Specifications

### Details

Users must be able to post news to a news page. The news will then be visible to all the users
having access to the page. Users should be able to add a news from an interface if he is allowed to
do so. This interface should also display a list of all the news in the database with actions to
apply to the corresponding news. These actions can be:

- Edit, modify the news content. Only the content must be changed, meaning that information such as
  the date of publication must remain unchanged.
- Delete, will permanently delete the news from the database without any means to recover it. Having
  heavy consequences, this action must be confirmed.
- Archive, will put the news into the archived section.
- Unarchive, will put the archived news into the public section.

Thus, a news can have two different states:

- Public, the news is public and visible on the news page.
- Archived, the news is archived and invisible on the news page, like if it was deleted.

### UML

Insert UML Here

A news has:

- An owner.
- A title.
- A content. The message of the news.
- A state. Whether it is archived or not.

## Database

The news will be stored in the `news` table.

## Permissions

### Guest

- See news on 'Home' page.

### Member

- All of the above.
- See news on 'News' page.

### Admin & Moderator

- All of the above.
- Post news.
- Edit news.
- Archive/Unarchive news.
- Delete news.
