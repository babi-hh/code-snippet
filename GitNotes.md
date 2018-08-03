## Git 常用操作
仓库地址变更
    
    git remote rm origin *
    git remote add origin *     
    
设置默认pull/push的分支
    git branch --set-upstream-to=origin/master

撤销add的文件

    git rm --cached <added_file>
撤销add的文件夹

    git rm -r --cached <added_file>
撤销所有的add操作

    git reset HEAD    
    
撤销commit 没有push的操作. 不删除工作代码, 撤销commit add 操作
    
    git reset HEAD^1
不删除工作代码, 不能撤销 add操作

    git reset --soft HEAD^
        
删除工作空间改动代码，撤销commit，撤销 add . 

    git reset --hard <commit_id>
        
修改最近一次的commit内容

    git commit --amend


## 合并多次提交(按步骤) [尽量少用]

    git rebase -i commit_id / git rebase -i HEAD~2

修改需要合并的提交hash值 保存:wq

    pick hash => squash hash 

修改注释信息    保存:wq

    git pull --rebae 

或者强制推送

    git push --force origin develop  

撤销修改

    git rebase --abort 



## 合并产生冲突时

新建一个分支 `cherry-pick_new`

    git fetch --all
    git checkout cherry-pick_new
    git rebase
    git cherry-pick 冲突的hash

    gst
    // TODO 解决冲突
    git add -u
    git cherry-pick --continue
    git push origin HEAD


## 换行符

git config --global core.autocrlf false

git config --global core.safecrlf true

autocrlf

提交时转换为LF，检出时转换为CRLF
`git config --global core.autocrlf true`

提交时转换为LF，检出时不转换
`git config --global core.autocrlf input`

提交检出均不转换
`git config --global core.autocrlf false`


